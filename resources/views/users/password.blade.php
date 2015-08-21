@extends('layouts.default')

@section('title') Perfil de usuario @stop

@section('slider')
    @include('layouts/partials/banner', [
        'titulo'    => $user->nombre,
        'subtitulo' => 'Perfil de usuario'
    ])
@stop

@section('content')

	<section class="about-company">
		<div class="container row">
			<div class="col6 center">
				{!! Form::open(['class' => 'form', 'method' => 'PUT']) !!}
					<fieldset>
						<legend>Datos de acceso:</legend>
						{!! Field::password('clave_actual', ['required', 'ph' => 'Contraseña actual']) !!}
                        {!! Field::password('clave', ['required', 'ph' => 'Nueva Contraseña']) !!}
                        {!! Field::password('clave_confirmation', ['required', 'ph' => 'Confirmar contraseña']) !!}
						<div class="field-submit">
							<button type="submit" class="btn">Cambiar contraseña</button>
						</div>
					</fieldset>
				{!! Form::close() !!}
            </div>
        </div>
    </section>

@stop

@section('scripts')
<script src="/assets/js/select2.min.js"></script>
<script src="/assets/js/select2_locale_es.js"></script>
@stop