<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Free HTML5 Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="{{ asset('admin/css/bootstrap-cerulean.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/charisma-app.css') }}" rel="stylesheet">
    <link href='{{ asset("admin/bower_components/fullcalendar/dist/fullcalendar.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/bower_components/fullcalendar/dist/fullcalendar.print.css") }}' rel='stylesheet' media='print'>
    <link href='{{ asset("admin/bower_components/chosen/chosen.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/bower_components/colorbox/example3/colorbox.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/bower_components/responsive-tables/responsive-tables.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/jquery.noty.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/noty_theme_default.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/elfinder.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/elfinder.theme.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/jquery.iphone.toggle.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/uploadify.css") }}' rel='stylesheet'>
    <link href='{{ asset("admin/css/animate.min.css") }}' rel='stylesheet'>
    <!-- uploadPreview styles -->
    <link href='{{ asset("admin/css/uploadPreview.css") }}' rel='stylesheet'>
    <!-- editorSummernote styles -->
    <link href='{{ asset("admin/css/editorSummernote.css") }}' rel='stylesheet'>

    <!-- jQuery -->
    <script src="{{ asset('admin/bower_components/jquery/jquery.min.js') }}"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">

</head>

{{-- Tag body with data-rouets --}}
@include('admin.layouts.body')

<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        {{-- <button type="button" class="navbar-toggle pull-left animated flip"> --}}
            {{-- <span class="sr-only">Toggle navigation</span> --}}
            {{-- <span class="icon-bar"></span> --}}
            {{-- <span class="icon-bar"></span> --}}
            {{-- <span class="icon-bar"></span> --}}
        {{-- </button> --}}
		<div class="navbar-brand">
			<img alt="Charisma Logo" src="{{ asset('admin/img/logo20.png') }}" class="hidden-xs"/> <span>Charisma</span>
		</div>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('home') }}">{{ Auth::user()->name ?? null }}</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                    @csrf
                    </form>
				</li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <!-- theme selector starts -->
        <div class="btn-group pull-right theme-container animated tada">
			<div class="btn-group" style="float: left">
				@include('locales.locale')			
			</div>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-tint"></i><span
                    class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="themes">
                <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
            </ul>
        </div>
        <!-- theme selector ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="{{ env("APP_URL") }}"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
            {{-- <li class="dropdown"> --}}
                {{-- <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span --}}
                        {{-- class="caret"></span></a> --}}
                {{-- <ul class="dropdown-menu" role="menu"> --}}
                    {{-- <li><a href="#">Action</a></li> --}}
                    {{-- <li><a href="#">Another action</a></li> --}}
                    {{-- <li><a href="#">Something else here</a></li> --}}
                    {{-- <li class="divider"></li> --}}
                    {{-- <li><a href="#">Separated link</a></li> --}}
                    {{-- <li class="divider"></li> --}}
                    {{-- <li><a href="#">One more separated link</a></li> --}}
                {{-- </ul> --}}
            {{-- </li> --}}
            {{-- <li> --}}
                {{-- <form class="navbar-search pull-left"> --}}
                    {{-- <input placeholder="Search" class="search-query form-control col-md-10" name="query" --}}
                           {{-- type="text"> --}}
                {{-- </form> --}}
            {{-- </li> --}}
        </ul>

    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">

@include('admin.layouts.sidebar')

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

@yield('content')

    </div><!--/fluid-row-->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">

        <hr>

    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- library for cookie management -->
<script src="{{ asset('admin/js/jquery.cookie.js') }}"></script>
<!-- calender plugin -->
<script src='{{ asset('admin/bower_components/moment/min/moment.min.js') }}'></script>
<script src='{{ asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.js') }}'></script>
<!-- data table plugin -->
{{--<script src='{{ asset('admin/js/jquery.dataTables.min.js') }}'></script>--}}

<!-- select or dropdown enhancer -->
<script src="{{ asset('admin/bower_components/chosen/chosen.jquery.min.js') }}"></script>
<!-- plugin for gallery image view -->
<script src="{{ asset('admin/bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<!-- notification plugin -->
<script src="{{ asset('admin/js/jquery.noty.js') }}"></script>
<!-- library for making tables responsive -->
<script src="{{ asset('admin/bower_components/responsive-tables/responsive-tables.js') }}"></script>
<!-- tour plugin -->
<script src="{{ asset('admin/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
<!-- star rating plugin -->
<script src="{{ asset('admin/js/jquery.raty.min.js') }}"></script>
<!-- for iOS style toggle switch -->
<script src="{{ asset('admin/js/jquery.iphone.toggle.js') }}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{ asset('admin/js/jquery.autogrow-textarea.js') }}"></script>
<!-- multiple file upload plugin -->
<script src="{{ asset('admin/js/jquery.uploadify-3.1.min.js') }}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{ asset('admin/js/jquery.history.js') }}"></script>
<!-- application script for Charisma demo -->
<script src="{{ asset('admin/js/charisma.js') }}"></script>
<!-- show picture by upload -->
<script src="{{ asset('admin/js/jquery.uploadPreview.js') }}"></script>
<!-- editorSummernote -->
<script src="{{ asset('admin/js/jquery.editorSummernote.js') }}"></script>
<!-- myScripts -->
<script src="{{ asset('admin/js/jquery.myJs.js') }}"></script>

</body>
</html>
