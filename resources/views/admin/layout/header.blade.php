<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Amezia - Responsive Bootstrap 4 style_admin Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="A premium style_admin dashboard template by themesbrand" name="description">
    <meta content="Themesbrand" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('style_admin/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('style_admin/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('style_admin/plugins/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('style_admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <link href="{{ asset('style_admin/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">


<!-- Profile Init -->
<link href="{{ asset('style_admin/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('style_admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
    
    <!-- App css -->
    <link href="{{ asset('style_admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style_admin/plugins/nestable/jquery.nestable.css') }}" rel="stylesheet">
    <link href="{{ asset('style_admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style_admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style_admin/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style_admin/css/style.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset('style_admin/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    var ajaxUrl="{{url('')}}/";
    window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>

<body>