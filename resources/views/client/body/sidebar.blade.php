<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="index.html">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="">
                                <span data-key="t-calendar">Add Menu</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('all.menu')}}">
                                <span data-key="t-calendar">All Menu</span>
                            </a>
                        </li>

                       
                    </ul>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('add.product')}}">
                                <span data-key="t-calendar">Add Product</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('all.product')}}">
                                <span data-key="t-calendar">All Product</span>
                            </a>
                        </li>

                       
                    </ul>
                    
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Gallery</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('add.gallery')}}">
                                <span data-key="t-calendar">Add Gallery</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('all.gallery')}}">
                                <span data-key="t-calendar">All Gallery</span>
                            </a>
                        </li>

                       
                    </ul>
                    
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('add.coupon')}}">
                                <span data-key="t-calendar">Add Coupon</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('all.coupon')}}">
                                <span data-key="t-calendar">All Coupon</span>
                            </a>
                        </li>

                       
                    </ul>
                    
                </li>


                



                

            </ul>

           
        </div>
        <!-- Sidebar -->
    </div>
</div>