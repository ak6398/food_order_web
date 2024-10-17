<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Mail\Websitemail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLoginSubmit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $check=$request->all();
        $data=[
            'email'=>$check['email'],
            'password'=>$check['password']
        ];
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success','You Successfuly logged in');
        }
        else{
            return redirect()->route('admin.login')->with('error','invalid credentials');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','you successfly logged out!!');
    }
    // end function

    public function adminforgetpassword()
    {
        return view('admin.forget_password');
    }
    // end function

    public function Admin_password_submit(Request $request){
        $request->validate([
            'email'=>'required|email',
        ]);
        $admin_data=Admin::where('email',$request->email)->first();
        if(!$admin_data){
            return redirect()->back()->with('error','Email not found');
        }
        $token=hash('sha256',time());
        $admin_data->token=$token;
        $admin_data->update();

        $reset_link=url('admin/reset-password/'.$token.'/'.$request->email);
        $subject="Reset Password";
        $message="Please Click on below Link to reset password<br>";
        $message.="<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->back()->with('success','Reset password Link Send on your email');
    }
    // end function

    public function Admin_reset_password($token,$email)
    {
        $admin_data1=Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin_data1){
            return redirect()->route('admin.login')->with('error','Invalid Token or email');
        }
        return view('admin.reset_password',compact('token','email'));
    }
    // end function
    public function Admin_reset_pass_submit(Request $request){
        $request->validate([
            'new_password'=>'required',
            'password_confirmation'=>'required|same:new_password',
        ]);

        $admin_data=Admin::where('email',$request->email)->where('token',$request->token)->first();
        $admin_data->password=Hash::make($request->new_password);
        $admin_data->token="";
        $admin_data->update();

        return redirect()->route('admin.login')->with('success','you reset the password successfuly');
    }
    // end function

    // admin profile area

    public function AdminProfile()
    {
        $id=Auth::guard('admin')->id();
        $profileData=Admin::find($id);
        return view('admin.admin_profile',compact('profileData'));
    }
    // end function
    // admin profile update to table admin
    public function AdminProfilestore(Request $request)
    {
        $id=Auth::guard('admin')->id();
        $data=Admin::find($id);

        $data->name=$request->name;
        $data->email=$request->email;
        $data->photo=$request->photo;
        $data->phone=$request->phone;
        $data->address=$request->address;

        $old_photopath=$data->photo;

        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'),$filename);
            $data->photo=$filename;

            if($old_photopath && $old_photopath !==$filename){
                $this->deleteOldImage($old_photopath);
            }
        }
        $data->save();
        $notification=array('message'=>'Profile updated successfully',
                    'alert-type'=>'success'
    );
        return redirect()->back()->with($notification);
    }
    // end function
    private function deleteOldImage(string $old_photopath):void{
        $fullPath=public_path('upload/admin_images/'.$old_photopath);
        if(file_exists($fullPath)){
            unlink($fullPath);
        }
    }
    // end private function

    public function AdminChangepassword()
    {
        $id=Auth::guard('admin')->id();
        $profileData=Admin::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }
    // end function here

    public function Adminpasswordupdate(Request $request)
    {
        $admin=Auth::guard('admin')->user();
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);

        if(!Hash::check($request->old_password,$admin->password)){
            $notification=array(
                'message'=>'Old password does not match',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
        // update the new password
        Admin::whereId($admin->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);
        $notification=array(
            'message'=>'password change successfuly',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    // ends here
}
