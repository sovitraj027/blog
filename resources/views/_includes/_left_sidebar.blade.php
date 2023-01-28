<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled nav nav-treeview" id="side-menu">
                <li class="menu-title">Home</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Menu Information</li>
                @can('view-post')
                <li>
                    <a href="{{ route('posts.index') }}" class="waves-effect">
                        <i class="fa fa-list"></i>
                        <span>Posts</span>
                    </a>
                </li>
                @endcan
                @can('view-category')
                <li>
                    <a href="{{route('categories.index')}}" class="waves-effect">
                        <i class="fa fa-list"></i>
                        <span>Categories</span>
                    </a>
                </li>
                @endcan
                @can('view-tag')
                <li>
                    <a href="{{route('tags.index')}}" class="waves-effect">
                        <i class="fa fa-list"></i>
                        <span>Tags</span>
                    </a>
                </li>
                @endcan
                @can('view-user')
                <li>
                    <a href="{{route('user.index')}}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endcan

                @can('view-role')
                <li>
                    <a href="{{route('roles.index')}}" class="waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>Roles And Permissions</span>
                    </a>
                </li>
                @endcan


                @can('role-view')
                <li>
                    <a href="{{route('roles.index')}}" class="waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>Roles and Permission</span>
                    </a>
                </li>
                @endcan
                @can('view-site')
                <li>
                    <a href="{{route('sites.index')}}" class="waves-effect">
                        <i class="fas fa-cog"></i>
                        <span>Site Setting</span>
                    </a>
                </li>
                @endcan


            </ul>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
