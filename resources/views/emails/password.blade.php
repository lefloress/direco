<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Recupere su contraseña</h2>

		<div>
			Para recuperar su contraseña por favor completa el siguiente formulario:

			{{ url('recuperar-contrasena/reset', [$token]) }}.<br/>

			Este enlace expirará en {{ config('auth.reminder.expire', 60) }} minutos.
		</div>
	</body>
</html>
