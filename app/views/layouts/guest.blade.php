<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/master.css') }}}">
</head>
<body>
	<div id="head"></div>
	@yield('content')
	<div id="foot"></div>
</body>
</html>