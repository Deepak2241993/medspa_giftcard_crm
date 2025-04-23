<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Forever Medspa Wellness Center</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('/')}}/medspa.png" type="image/x-icon" />
        <!-- preloader css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/preloader.min.css') }}" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

{{-- for summernote --}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  </head>

    @yield('body')

    @yield('content')

    @if(route('email-template.create')!=url()->current() && Request::segment(2)!='email-template')
    {
    <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js') }}"></script> 
    }
    @endif
    
    <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/feather-icons/feather-icons.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ URL::asset('assets/libs/pace-js/pace-js.min.js') }}"></script>
    </body>
</html>
