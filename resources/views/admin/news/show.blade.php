@extends('admin/layout')

@section('content')

<h1>
    Noticias
</h1>

<div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Eliminar noticia</h4>
            </div>
            <div class="modal-body">
                ¿Eliminar noticia?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::open(array('url' => 'admin/noticias/' . $news->id, 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

{!! Alert::render() !!}

<table class="table">
    <tr>
        <td><strong>Titulo</strong></td>
        <td>{!! $news->titulo !!}</td>
    </tr>
    <tr>
        <td><strong>Estatus</strong></td>
        <td>{!! $news->estatus !!}</td>
    </tr>
    <tr>
        <td><strong>Fecha de publicacion</strong></td>
        <td>{!! $news->fecha_de_publicacion !!}</td>
    </tr>
    <tr>
        <td><strong>Contenido</strong></td>
        <td>{!! $news->contenido !!}</td>
    </tr>
</table>

<a href="{!! $news->id !!}/edit" class="btn btn-primary">Editar</a>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteNewsModal">Eliminar</a>

@stop
