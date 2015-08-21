@extends('admin/layout')

@section('content')

<h1>
    Paginas / {{ ucfirst($section) }}
</h1>

{!! Alert::render() !!}

@include('admin/errors')

{!! Form::model($page, ['route' => ['admin.paginas.update', $section, $page], 'method' => 'PUT', 'class' => 'form']) !!}

    @include('admin/pages/partials/fields')

    <button type="submit" class="btn btn-primary">Guardar cambios</button>

{!! Form::close() !!}  

@stop
