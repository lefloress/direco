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
			<div class="col12">
				{!! Form::model(Auth::user(), ['class' => 'form', 'method' => 'PUT']) !!}
					<fieldset>
						<legend>Datos de acceso:</legend>
						{!! Field::email('email', ['required', 'ph' => 'Correo Electrónico', 'class' => 'field-half', 'readonly']) !!}
					</fieldset>
					<fieldset>
						<legend>Datos Fiscales (Facturar a)</legend>
						<div class="group-fields">
					    	{!! Field::text('nombre', ['required']) !!}
					    	{!! Field::text('cedula_rif', ['required', 'readonly']) !!}
						</div>
						<div class="group-fields">
					    	{!! Field::text('telefono1', ['required']) !!}
					    	{!! Field::text('telefono2') !!}
						</div>
						{!! Field::text('celular', ['class' => 'field-half']) !!}
						<div class="group-fields">
							{!! Field::select('estado', $estados, ['required', 'class' => 'select2']) !!}
							{!! Field::select('municipio', $municipios, ['required', 'class' => 'select2']) !!}
						</div>
						{!! Field::select('parroquia', $parroquias, ['required', 'class' => 'field-half select2']) !!}
                        <div class="group-fields">
                            {!! Field::text('direccion_fiscal1', ['required', 'ph' => 'Avenida / Calle / Esquina / Carrera']) !!}
                            {!! Field::text('direccion_fiscal2', ['required', 'ph' => 'Edificio / Residencia / Quinta / Local']) !!}
                        </div>
                        <div class="group-fields">
                            {!! Field::text('direccion_fiscal3', ['required', 'ph' => 'Piso / Nivel / Apartamento / Oficina']) !!}
                            {!! Field::text('direccion_fiscal4', ['required', 'ph' => 'Urbanización / Zona / Sector']) !!}
                        </div>
                        {!! Field::text('direccion_fiscal5', ['ph' => 'Punto de referencia', 'class' => 'field-half']) !!}
                        {!! Field::select('id_actividad_economica', $actividades, ['required', 'class' => 'field-half  select2']) !!}
						<div class="field-submit">
							<button type="submit" class="btn">Actualizar datos</button>
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