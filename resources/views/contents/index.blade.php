<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <title>Tes | Jendela360</title>
	    <!-- Favicon-->

	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	    <!-- Font Awesome -->
    	<link rel="stylesheet" href="{{ url('public/css/font-awesome/css/font-awesome.min.css') }}">

	    <link rel="stylesheet" href="{{ url('public/css/sweetalert.css') }}">
   	</head>
	<body>
		<h1>TES</h1>
		{{ $hari_ini }}
		
	</body>
	<script src="{{ url('public/js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
</html>