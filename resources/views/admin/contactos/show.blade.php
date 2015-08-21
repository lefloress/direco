@extends('admin/layout')

@section('content')

<h1>
    Contactos 
</h1>

<div class="modal fade" id="deleteMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
            </div>
            <div class="modal-body">
                ¿Eliminar mensaje de contacto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::open(array('url' => 'admin/contactos/' . $contacto->id, 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

{!! Alert::render() !!}

<table class="table">
    <tr>
        <td><strong>Nombre</strong></td>
        <td>{!! $contacto->nombre !!}</td>
    </tr>
    <tr>
        <td><strong>Correo</strong></td>
        <td>{!! $contacto->correo !!}</td>
    </tr>
    <tr>
        <td><strong>Telefono</strong></td>
        <td>{!! $contacto->telefono !!}</td>
    </tr>
    <tr>
        <td><strong>Empresa</strong></td>
        <td>{!! $contacto->empresa !!}</td>
    </tr>
    <tr>
        <td><strong>Mensaje</strong></td>
        <td>{!! $contacto->mensaje !!}</td>
    </tr>
</table>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteMsgModal">Eliminar</a>

@stop
