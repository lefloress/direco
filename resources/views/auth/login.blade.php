@extends('layouts.default')

@section('title') Inicio de sesión @stop
@section('description') Iniciar sesión @stop

@section('content')

	<section class="banner">
		<div class="container">
			<div class="col12">
				<h2>Usuario</h2>
				<p>Inicio de sesión</p>
			</div>
		</div>
	</section>
	<section class="user user-login">
		<div class="container row">
			<div class="col4 center">
                {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => "form"]) !!}
					<fieldset>
					    {!! Field::email('email', ['ph' => 'Correo Electrónico']) !!}
						{!! Field::password('clave', ['ph' => 'Contraseña']) !!}
						<div class="field-submit txt-center">
							<button type="submit" class="btn">Iniciar sesión</button>
						</div>
					</fieldset>
				{!! Form::close() !!}
			</div>
		</div>
	</section>

@stop