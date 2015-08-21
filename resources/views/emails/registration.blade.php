<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ $user->nombre }}, por favor confirma tu registro</h2>

		<div>
		    Para confirmar tu registro en Direco por favor accede al siguiente enlace:
		    <a href="{{ $url }}">{{ $url }}</a>
		</div>
	</body>
</html>