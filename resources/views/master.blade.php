<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
		<script src="components/webcomponentsjs/webcomponents.min.js"></script>
		<script src="js/app.js"></script>

		<title>Calculator</title>

		<link href="css/app.css" rel="stylesheet" type="text/css" />
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300'
rel='stylesheet' type='text/css' />
	</head>
	<body>
		@include("header")

		@yield("calculator")

		@include("footer")

	</body>
</html>
