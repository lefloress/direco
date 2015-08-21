@extends('admin/layout')

@section('content')

<h1>
    Contenido / {{ ucfirst($section) }}
</h1>

@include('admin/partials/delete-modal', [
    'title' => 'Eliminar ' . $section,
    'route' => ['admin.contenido.destroy', $section, $content]
])

{!! Alert::render() !!}

<table class="table">
    <tr>
        <th>Título</th>
        <td>{{ $content->titulo }}</td>
    </tr>
    <tr>
        <th>Sección</th>
        <td>{{ $content->seccion  }}</td>
    </tr>
    <tr>
        <th>URL</th>
        <td>{{ $content->slug_url }}</td>
    </tr>
    <tr>
        <th>Estatus</th>
        <td>{{ $content->estatus }}</td>
    </tr>
    <tr>
        <th>Orden</th>
        <td>{{ $content->orden }}</td>
    </tr>
    <tr>
        <th>Descripción META</th>
        <td>{{ $content->meta_description }}</td>
    </tr>
    <tr>
        <th>Contenido</th>
        <td>{!! $content->contenido !!}</td>
    </tr>
    <tr>
        <th>Fecha</th>
        <td>{{ $content->fecha }}</td>
    </tr>
</table>

<a href="{{ route('admin.contenido.edit', ['section' => $section, 'id' => $content]) }}" class="btn btn-primary">Editar</a>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletePageModal">Eliminar</a>

@stop
