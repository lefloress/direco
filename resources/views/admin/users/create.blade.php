@extends('admin/layout')

@section('content')

<h1>
    Usuarios 
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::open(array('url' => 'admin/usuarios'), ['class' => 'form', 'method' => 'POST']) !!}
    
    {!! Form::label('cedula_rif', 'Cedula') !!}
    {!! Form::text('cedula_rif', null, ['class' => 'form-control']) !!}

    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal1', 'Avenida / Calle / Esquina / Carrera') !!}
    {!! Form::text('direccion_fiscal1', null, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal2', 'Edificio / Residencia / Quinta / Local') !!}
    {!! Form::text('direccion_fiscal2', null, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal3', 'Piso / Nivel / Apartamento / Oficina') !!}
    {!! Form::text('direccion_fiscal3', null, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal4', 'Urbanización / Zona / Sector') !!}
    {!! Form::text('direccion_fiscal4', null, ['class' => 'form-control']) !!}
    
    {!! Form::label('direccion_fiscal5', 'Punto de referencia') !!}
    {!! Form::text('direccion_fiscal5', null, ['class' => 'form-control']) !!}

    {!! Form::label('telefono1', 'Telefono 1') !!}
    {!! Form::text('telefono1', null, ['class' => 'form-control']) !!}

    {!! Form::label('telefono2', 'Telefono 2') !!}
    {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
    
    {!! Form::label('celular', 'Celular') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}

    {!! Form::label('estado', 'Estado') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}

    {!! Form::label('municipio', 'Municipio') !!}
    {!! Form::text('municipio', null, ['class' => 'form-control']) !!}

    {!! Form::label('parroquia', 'Parroquia') !!}
    {!! Form::text('parroquia', null, ['class' => 'form-control']) !!}

    {!! Form::label('estatus', 'Estatus') !!}
    {!! Form::select('estatus', array(
        'A' => 'Activo',
        'I' => 'Inactivo'), null, 
        array('class' => 'form-control'))
    !!}
    
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    {!! Form::label('clave', 'Contrase&ntilde;a') !!}
    {!! Form::password('clave', ['class' => 'form-control']) !!}
    
    {!! Form::label('clave_confirmation', 'Confirmar contrase&ntilde;a') !!}
    {!! Form::password('clave_confirmation', ['class' => 'form-control']) !!}
   
    {!! Form::label('role', 'Tipo de usuario') !!}
    {!! Form::select('role', array(
        'user' => 'Usuario',
        'admin' => 'Administrador'), null, 
        array('class' => 'form-control'))
    !!}

    {!! Form::hidden('id_actividad_economica', '0') !!}
    <button type="submit" class="btn btn-primary">Crear usuario</button>

{!! Form::close() !!}  

@stop
