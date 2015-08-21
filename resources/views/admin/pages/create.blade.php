@extends('admin/layout')

@section('content')

<h1>
    Paginas
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::open(['route' => ['admin.paginas.store', $section], 'class' => 'form', 'method' => 'POST']) !!}

    @include('admin/pages/partials/fields')

    <button type="submit" class="btn btn-primary">Crear pagina</button>

{!! Form::close() !!}  

@stop
