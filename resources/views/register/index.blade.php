@extends('layouts.default')

@section('title') Registro Usuario @stop
@section('description') Registro de nuevos usuarios @stop

@section('content')

	<section class="banner">
		<div class="container">
			<div class="col12">
				<h2>Usuario</h2>
				<p>Registro</p>
			</div>
		</div>
	</section>
	<section class="user user-register">
		<div class="container row">
			<div class="col12">
				<h3>Registro de Clientes</h3>
				{!! Form::model($usuario, ['class' => 'form', 'method' => 'POST']) !!}
					<fieldset>
						<legend>Datos de acceso:</legend>
						{!! Field::email('email', ['required', 'ph' => 'Correo Electrónico', 'class' => 'field-half']) !!}
						<div class="group-fields">
							{!! Field::password('clave', ['required', 'ph' => 'Contraseña']) !!}
							{!! Field::password('clave_confirmation', ['required', 'ph' => 'Confirmar contraseña']) !!}
						</div>
					</fieldset>
					<fieldset>
						<legend>Datos Fiscales (Facturar a)</legend>
						<div class="group-fields">
					    	{!! Field::text('nombre', ['required']) !!}
					    	{!! Field::custom('cedula_rif', ['required', 'template' => 'components.field.rif']) !!}
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
							<button type="submit" class="btn">Registrarse</button>
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