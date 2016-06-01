<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lunch Sushi</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{URL::asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset("css/index.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset ("js/jQuery-2.2.0.min.js") }}"></script>
    <script src="{{ URL::asset ("js/bootstrap.js") }}" type="text/javascript"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>
@include('app.header')
@yield('content')
@include('app.footer')
</body>
</html>