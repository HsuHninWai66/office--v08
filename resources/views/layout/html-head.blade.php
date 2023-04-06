<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>OFFICE! | Laravel Framework</title>

    <!-- Bootstrap -->
    <link href="{!! asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{!! asset('assets/admin/vendors/vendors/nprogress/nprogress.css') !!}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{!! asset('assets/admin/vendors/iCheck/skins/flat/green.css') !!}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{!! asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') !!}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{!! asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css') !!}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{!! asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{!! asset('assets/admin/build/css/custom.min.css') !!}" rel="stylesheet">

  </head>

  {{-- Common Css --}}
  <style>
    .text-gradiant {
      background-image: -webkit-linear-gradient(45deg,#9c7efe,#faaca8) !important;
      text-shadow:none;-webkit-background-clip: text;-webkit-text-fill-color: transparent;
    }
    .table-striped tbody tr:nth-of-type(odd)
    {
      background-image: -webkit-linear-gradient(45deg,#3c00ff0f,#ffccca2e);
    }
    .col-bg{
      background-image: -webkit-linear-gradient(90deg,#3c00ff0f,#ffccca2e);
    }
    .dash-col-pink {
      background: #fa82a88f;
    }
    .dash-col-purple {
      background: #612b9ab8;
    }

    .btn-gradiant {
        background-image: -webkit-linear-gradient(45deg,#9c7efe,#faaca8);
        color: #FFF;
    }
    .btn:hover , .btn-secondary:hover{
        background-image: none !important;
        background-color: inherit !important;
        border:1px solid #9c7efe !important;
        color:#000 !important;
    }
    .login_content form input[type="submit"]:hover, #content form .submit:hover {
        background-image: none !important;
        background-color: inherit !important;
        border:1px solid #9c7efe !important;
        color:#000 !important;
    }
  </style>

