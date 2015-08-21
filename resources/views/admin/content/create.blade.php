@extends('admin/layout')

@section('content')

<h1>
    Contenido / {{ ucfirst($section) }}
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::open(['route' => ['admin.contenido.store', $section], 'class' => 'form', 'method' => 'POST']) !!}

    @include('admin/content/partials/fields')

    <button type="submit" class="btn btn-primary">Crear {{ $section }}</button>

{!! Form::close() !!}  

@stop
