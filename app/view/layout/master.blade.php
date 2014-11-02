<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title> - 博客</title>
  <style type="text/css">
  	#page{width:980px;margin:auto;}
  	#main {float:left;width:%60;}
  	#siderbar{float:right;width:%37;}
  </style>
</head>

<body background="./../img/1.jpg">
<div id='page'>
	<div id='main'>
		@yield('content')	
	</div>
	<div id='siderbar'>
		@section('siderbar')
			this is default siderbar
		@show
	</div>
</body></html>