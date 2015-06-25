<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('cms.app_name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ cms_asset_path('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ cms_asset_path('template/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ cms_asset_path('template/css/skins/skin-' . config('cms.template_skin') . '.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="{{ cms_body_class() }}">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('CMS::admin.home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>{{ Config::get('cms.app_name') }}</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{{ Config::get('cms.app_name') }}</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ Auth::user()->present()->photo }}" class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ Auth::user()->present()->photo }}" class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->name }} - {{ Auth::user()->present()->typeTitle }}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                    <a href="{{ route('CMS::admin.users.update-my-password') }}" class="btn btn-default btn-flat">
                                        <span class="fa fa-lock"></span> @lang('CMS::users.update_my_password')
                                    </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('CMS::admin.logout') }}" class="btn btn-default btn-flat">
                                            <span class="fa fa-sign-out"></span> @lang('CMS::core.logout')
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <!-- Left side column. contains the logo and sidebar -->
        @include('CMS::partials._main_sidebar_menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <script src="{{ cms_asset_path('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ cms_asset_path('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ cms_asset_path('template/js/app.min.js') }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
</body>
</html>