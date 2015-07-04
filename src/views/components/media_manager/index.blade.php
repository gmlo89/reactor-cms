<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" value="{{ csrf_token() }}" >
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Media Manager</title>

    <!-- Bootstrap -->
    <link href="{{ cms_asset_path('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ cms_asset_path('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="{{ cms_asset_path('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <!-- include the style -->
    <link rel="stylesheet" href="{{ cms_asset_path('plugins/alertifyjs/css/alertify.min.css') }}" />
    <!-- include a theme -->
    <link rel="stylesheet" href="{{ cms_asset_path('plugins/alertifyjs/css/themes/default.min.css') }}" />
    <!-- Custom css -->
    <link href="{{ cms_asset_path('components/media-manager/css/media-manager.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="mediaManager">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span v-if="uploading"> - @lang('CMS::media_manager.uploading')</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- Put bottons for edit and delete items -->
            </ul>


            <!-- Search form -->
            <form v-if="!uploading" class="navbar-form navbar-left" role="search">
                <div class="input-group">
                    <input v-model="finder" type="text" class="form-control" placeholder="@lang('CMS::media_manager.search')">
                    <span class="input-group-btn">
                        <button v-on="click: findAsset" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
            <div v-if="selectingAsset" class="asset-options">
                <button v-on="click: deleteAsset" class="btn btn-danger btn-sm navbar-btn pull-left"><span class="glyphicon glyphicon-trash"></span></button>
                <button v-on="click: editAsset" class="btn btn-info btn-sm navbar-btn pull-left"><span class="glyphicon glyphicon-pencil"></span></button>
                <p class="navbar-text">@{{ selectedAsset.name.substring(0, 20) }}</p>
            </div>

            <button v-if="! uploading" v-on="click: showUploadFile" type="button" class="btn btn-default navbar-btn pull-right"><span class="glyphicon glyphicon-open"></span> @lang('CMS::media_manager.upload')</button>
            <button id="btnCancelUpload" v-if="showBtnCancel" v-on="click: hideUploadFile" type="button" class="btn btn-danger navbar-btn pull-right"><span class="glyphicon glyphicon-remove"></span> @lang('CMS::media_manager.cancel')</button>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    <component
        is="@{{ currentView }}"
        change-component="@{{ getComponent }}"
        selected-asset="@{{ selectAsset }}"
        asset="@{{ selectedAsset }}"
        assets="@{{ assets }}"
        >
    </component>


<!-- Scripts -->

<!-- jQuery 2.1.4 -->
<script src="{{ cms_asset_path('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript" charset="utf-8">
    {!! MediaManager::renderRoutesJS() !!}
</script>
<!-- JS vue.js -->
<script src="{{ cms_asset_path('components/media-manager/js/bundle.js') }}" type="text/javascript"></script>
</body>
</html>