<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proskool</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo.png')}}"> 
    
    <script defer src="{{ URL::asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">

    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('assets/css/portal.css')}}">
 
 <style>
          *{
            text-transform: capitalize;
            font-family: Slabo;
           }

         h1{
           text-decoration:underline;
           text-transform: uppercase;
           }

        .cell,th,td{

            text-align: center;

        }

        label{

         color:#FF4500;
         font-family: Courier New;

             }
    </style>

</head>

<body class="app">
    <header class="app-header fixed-top">
        <!-- Sidebar -->
        @include('common.header')
        @include('common.sidebar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->
        @include('common.footer')
        <!-- Javascript -->
        <script src="{{ URL::asset('assets/plugins/popper.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Page Specific JS -->
        <script src="{{ URL::asset('assets/js/app.js')}}"></script>

</body>

</html>