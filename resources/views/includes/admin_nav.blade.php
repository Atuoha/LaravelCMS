<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        </div>
        <!-- /.navbar-header -->



        <ul class="nav navbar-top-links navbar-right"> </ul>






       <ul class="nav navbar-nav navbar-right">
        @if(auth()->guest())
       @if(!Request::is('auth/login'))
      <li><a href="{{ url('/auth/login') }}">Login</a></li>
        @endif
        @if(!Request::is('auth/register'))
        <li><a href="{{ url('/auth/register') }}">Register</a></li>
      @endif
       @else
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
       <li> <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form></a></li>

       <li><a href="{{ route('admin.profile') }}">Profile</a></li>
     </ul>
     </li>
      @endif
     </ul>





        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="/admin"><i class="fas fa-dashboard "></i> Dashboard</a>
                    </li>

                    <li>
                        <a href=" {{ route('admin.profile') }}"><i class="fas fa-user "></i> Profile</a>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-user "></i>Users<span class="fas arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/users">All Users</a>
                            </li>

                            <li>
                                <a href="/admin/users/create">Create User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-wrench fa-fw"></i> Posts<span class="fas arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('posts.index') }}">All Posts</a>
                            </li>

                            <li>
                                <a href="{{ route('posts.create') }}">Create Post</a>
                            </li>

                            <li>
                                <a href="{{ route('comments.index') }}">All Comments</a>
                             </li>

                             <li>
                                <a href="{{ route('replies.index') }}">All Replies</a>
                             </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    


                    <li>
                        <a href="#"><i class="fas fa-wrench fa-fw"></i>Categories<span class="fas arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('category.index') }}">All Categories</a>
                            </li>

                            <li>
                                <a href="{{ route('category.create') }}">Create Category</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#"><i class="fas fa-wrench fa-fw"></i>Media<span class="fas arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('media.index') }}">All Media</a>
                            </li>

                            <li>
                                <a href="{{ route('media.create') }}">Upload Media</a>
                    </li>

         

                </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href=" {{ route('blog_home') }}"><i class="fas fa-user "></i> Website</a>
                    </li>

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>