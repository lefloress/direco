@extends('admin/layout')

@section('content')

<h1>
    Contenido / {{ ucfirst($section) }}
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::model($content, ['route' => ['admin.contenido.update', $section, $content], 'method' => 'PUT', 'class' => 'form']) !!}

    @include('admin/content/partials/fields')

    <button type="submit" class="btn btn-primary">Guardar cambios</button>

{!! Form::close() !!}  

@stop
