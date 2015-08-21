@extends('admin/layout')

@section('content')

<h1>
    Noticias    
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::open(array('url' => 'admin/noticias'), ['class' => 'form', 'method' => 'POST']) !!}

    {!! Form::label('titulo', 'Titulo') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
    
    {!! Form::label('estatus', 'Estatus') !!}
    {!! Form::select('estatus', array(
        'activo' => 'Activo',
        'inactivo' => 'Inactivo'), null, 
        array('class' => 'form-control'))
    !!}
   
    {!! Form::label('contenido', 'Contenido') !!}
    {!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}

    <button type="submit" class="btn btn-primary">Agregar noticia</button>

{!! Form::close() !!}  

@stop
