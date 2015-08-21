@extends('admin/layout')

@section('content')

<h1>
    Noticias
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::open(array('url' => 'admin/noticias/' . $news->id, 'method' => 'PUT'), ['class' => 'form']) !!}

    {!! Form::label('titulo', 'Titulo') !!}
    {!! Form::text('titulo', $news->titulo, ['class' => 'form-control']) !!}

    {!! Form::label('estatus', 'Estatus') !!}
    {!! Form::select('estatus', array(
        'activo' => 'Activo',
        'inactivo' => 'Inactivo'), $news->estatus, 
        array('class' => 'form-control'))
    !!}
  
    {!! Form::label('contenido', 'Contenido') !!}
    {!! Form::textarea('contenido', $news->contenido, ['class' => 'form-control']) !!}

    <button type="submit" class="btn btn-primary">Guardar cambios</button>

{!! Form::close() !!}  

@stop
