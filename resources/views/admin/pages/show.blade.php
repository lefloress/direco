@extends('admin/layout')

@section('content')

<h1>
    Paginas
</h1>

@include('admin/partials/delete-modal', [
    'title' => 'Eliminar página',
    'route' => ['admin.paginas.destroy', $section, $page]
])

{!! Alert::render() !!}

<table class="table">
    <tr>
        <th>Titulo</th>
        <td>{{ $page->titulo }}</td>
    </tr>
    <tr>
        <th>Seccion</th>
        <td>{{ $page->seccion  }}</td>
    </tr>
    <tr>
        <th>URL</th>
        <td>{{ $page->slug_url }}</td>
    </tr>
    <tr>
        <th>Estatus</th>
        <td>{{ $page->estatus }}</td>
    </tr>
    <tr>
        <th>Orden</th>
        <td>{{ $page->orden }}</td>
    </tr>
    <tr>
        <th>Descripción META</th>
        <td>{{ $content->meta_description }}</td>
    </tr>
    <tr>
        <th>Contenido</th>
        <td>{!! $page->contenido !!}</td>
    </tr>
</table>

<a href="{{ route('admin.paginas.edit', ['section' => $section, 'id' => $page]) }}" class="btn btn-primary">Editar</a>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletePageModal">Eliminar</a>

@stop
