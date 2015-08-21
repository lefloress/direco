@extends('layouts.default')

@section('title') Inicio de sesión @stop
@section('description') Iniciar sesión @stop

@section('content')

	<section class="banner">
		<div class="container">
			<div class="col12">
				<h2>Usuario</h2>
				<p>Recuperar Contraseña</p>
			</div>
		</div>
	</section>
	<section class="user user-login">
		<div class="container row">
			<div class="col4 center">
			    {!! Form::open(['url' => 'recuperar-contrasena/reset', 'method' => 'post', 'class' => 'form']) !!}
					<fieldset>
				    	{!! Form::hidden('token', $token) !!}
				    	{!! Field::email('email', ['ph' => 'Correo electrónico']) !!}
					    {!! Field::password('password', ['ph' => 'Contraseña']) !!}
					    {!! Field::password('password_confirmation', ['ph' => 'Confirmar contraseña']) !!}
						<div class="field-submit txt-center">
							<button type="submit" class="btn">Enviar email</button>
						</div>
					</fieldset>
				{!! Form::close() !!}
			</div>
	    </div>
	</section>

@stop