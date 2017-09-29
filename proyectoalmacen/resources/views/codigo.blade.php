<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="{{ url('codigo') }}">
		<input type="hidden" name="_token" value="{{ csrf_token()}}">
		<input type="number" name="documento" autofocus="true">		
	</form>

</body>
</html>