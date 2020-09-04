<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/libs/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/libs/font-awesome.css')}}" rel="stylesheet">




    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('blog_home') }}"> - BuildCMS </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li><a href="/admin">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>

                    @else
                    <li><a href="{{ route('login') }}">Login to dashboard</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>

                    @endif   

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>