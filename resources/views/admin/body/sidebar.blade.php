<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('all.category')}}">
                                <span data-key="t-calendar">All Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.category')}}">
                                <span data-key="t-calendar">Add Category</span>
                            </a>
                        </li>

                       
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">City</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.city')}}" data-key="t-starter-page">All City</a></li>
                        
                       
                    </ul>
                </li>

            
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('adm_all.product')}}" data-key="t-g-maps">All Product</a></li>
                        <li><a href="#" data-key="t-v-maps">Add Product</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Manage Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('all.banner')}}" data-key="t-g-maps">All Banner</a></li>
                        
                        
                    </ul>
                </li>

                

            </ul>

           
        </div>
        <!-- Sidebar -->
    </div>
</div>