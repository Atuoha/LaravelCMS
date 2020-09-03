<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('assets/css/libs/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/styles.css')}}" rel="stylesheet">


  



</head>


<body id="admin-page">

<div id="wrapper">

@include('includes.admin_nav')
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fas fa-dashboard fa-fw"></i>Profile</a>
                </li>

                <li>
                    <a href="#"><i class="fas fa-wrench fa-fw"></i> Posts<span class="fas arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="">All Posts</a>
                        </li>

                        <li>
                            <a href="">Create Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>





            </ul>

        </div>

    </div>

</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/js/libs/jquery.js')}}"></script>
 <script src="{{asset('assets/js/libs/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/libs/metisMenu.js')}}"></script> 
<script src="{{asset('assets/js/libs/sb-admin-2.js')}}"></script>
<script src="{{asset('assets/js/libs/scripts.js')}}"></script>

@yield('scripts')


@yield('footer')





</body>

</html>
