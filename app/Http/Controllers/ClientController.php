<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function ClientLogin()
    {
        return view('client.client_login');
    }
    // ends herer

    public function ClientRegister()
    {
        return view('client.client_register');
    }
    // ends herer

    public function ClientRegistersubmit(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:200'],
            'email'=>['required','string','unique:clients']
        ]);

        Client::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>'0',
            'role'=>'client',

        ]);
        $notification=array(
            'message'=>'Client Register Successfuly',
            'alert-type'=>'success'
        );
        return redirect()->route('client.login')->with($notification);

    }
    // ends herer

    public function Clientloginsubmit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $check=$request->all();
        $data=[
            'email'=>$check['email'],
            'password'=>$check['password'],
        ];
        if(Auth::guard('client')->attempt($data)){
            return redirect()->route('client.dashboard')->with('success','Login successfuly');
        }
        else{
            return redirect()->route('client.login')->with('error','Invalid credentials');
        }
    }
    // ends here

    public function Clientdashboard()
    {
        return view('client.index');
    }
    // ends here

    public function Clientlogout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('client.login')->with('success','You logged out successfuly');
    }
    // ends here
    public function Clientprofile()
    {
        $id=Auth::guard('client')->id();
        $profileData=Client::find($id);
        return view('client.client_profile',compact('profileData'));

    }
    // ends here

    public function Clientprofilesubmit(Request $request)
    {
        $id=Auth::guard('client')->id();
        $data=Client::find($id);

        $data->name=$request->name;
        $data->email=$request->email;
        $data->photo=$request->photo;
        $data->phone=$request->phone;
        $data->address=$request->address;

        $oldPhotoPath=$data->photo;

        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/client_images'),$filename);
            $data->photo=$filename;

            if($oldPhotoPath && $oldPhotoPath !==$filename){
                $this->deleteOldImage($oldPhotoPath);
            }

        }
        $data->save();
        return redirect()->back();
    }
    // ends here
    private function deleteOldImage(string $oldPhotoPath):void{
        $fullPath=public_path('upload/client_images/'.$oldPhotoPath);
        if(file_exists($fullPath)){
            unlink($fullPath);
        }
    }
    // end private method
}
