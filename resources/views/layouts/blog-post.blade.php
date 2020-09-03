@include('includes.home_header')

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                    @yield('content')
            </div>
            <!-- Blog Sidebar Widgets Column -->
                @include('includes.home_sideBar')
        </div>
        <hr>
        @include('includes.home_footer')
    </div>
    <!-- /.container -->

   


