@include('includes.home_header')


 <!-- Page Content -->
 <div class="container">
    <div class="row">
    <!-- Blog Entries Column -->
         <div class="col-md-8">
            <h1 class="page-header">
                BuildCMS </>
                <small>With Laravel 7.x</small>
            </h1>
                @yield('content')

                <hr>
                <!-- Pager -->
                <div class="row">
                <div class="col-sm-6 col-offset-sm-5">
                    {{ $posts->render() }}
                </div>
                </div>
        </div>

    <!-- Blog Sidebar Widgets Column -->
    @include('includes.home_sideBar')
 </div>

 
@include('includes.home_footer')
</div>



