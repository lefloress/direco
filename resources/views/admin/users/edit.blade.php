@extends('admin/layout')

@section('content')

<h1>
    Usuarios 
</h1>

{!! Alert::render() !!}

@include('admin/errors')

@include('admin/users/partials/change_password')

{!! Form::open(array('url' => 'admin/usuarios/' . $user->cedula_rif, 'method' => 'PUT'), ['class' => 'form']) !!}
    
    {!! Form::label('cedula_rif', 'Cedula') !!}
    {!! Form::text('cedula_rif', $user->cedula_rif, ['class' => 'form-control']) !!}

    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $user->nombre, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal1', 'Avenida / Calle / Esquina / Carrera') !!}
    {!! Form::text('direccion_fiscal1', $user->direccion_fiscal1, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal2', 'Edificio / Residencia / Quinta / Local') !!}
    {!! Form::text('direccion_fiscal2', $user->direccion_fiscal2, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal3', 'Piso / Nivel / Apartamento / Oficina') !!}
    {!! Form::text('direccion_fiscal3', $user->direccion_fiscal3, ['class' => 'form-control']) !!}

    {!! Form::label('direccion_fiscal4', 'Urbanización / Zona / Sector') !!}
    {!! Form::text('direccion_fiscal4', $user->direccion_fiscal4, ['class' => 'form-control']) !!}
    
    {!! Form::label('direccion_fiscal5', 'Punto de referencia') !!}
    {!! Form::text('direccion_fiscal5', $user->direccion_fiscal5, ['class' => 'form-control']) !!}

    {!! Form::label('telefono1', 'Telefono 1') !!}
    {!! Form::text('telefono1', $user->telefono1, ['class' => 'form-control']) !!}

    {!! Form::label('telefono2', 'Telefono 2') !!}
    {!! Form::text('telefono2', $user->telefono2, ['class' => 'form-control']) !!}
    
    {!! Form::label('celular', 'Celular') !!}
    {!! Form::text('celular', $user->celular, ['class' => 'form-control']) !!}

    {!! Form::label('estado', 'Estado') !!}
    {!! Form::text('estado', $user->estado, ['class' => 'form-control']) !!}

    {!! Form::label('municipio', 'Municipio') !!}
    {!! Form::text('municipio', $user->municipio, ['class' => 'form-control']) !!}

    {!! Form::label('parroquia', 'Parroquia') !!}
    {!! Form::text('parroquia', $user->parroquia, ['class' => 'form-control']) !!}

    {!! Form::label('estatus', 'Estatus') !!}
    {!! Form::select('estatus', array(
        'A' => 'Activo',
        'I' => 'Inactivo'), $user->estatus, 
        array('class' => 'form-control'))
    !!}
    
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
    
    {!! Form::hidden('clave', 'disabled') !!}
    {!! Form::hidden('clave_confirmation', 'disabled') !!}

    {!! Form::label('role', 'Tipo de usuario') !!}
    {!! Form::select('role', array(
        'user' => 'Usuario',
        'admin' => 'Administrador'), $user->role, 
        array('class' => 'form-control'))
    !!}

    {!! Form::hidden('id_actividad_economica', '0') !!}
    
    <button type="submit" class="btn btn-primary">Guardar cambios</button>

{!! Form::close() !!}  

@stop
