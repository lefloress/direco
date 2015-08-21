@extends('admin/layout')

@section('content')

<h1>
    Usuarios
</h1>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Eliminar pagina</h4>
            </div>
            <div class="modal-body">
                ¿Eliminar usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::open(array('url' => 'admin/usuarios/' . $user->CEDULA_RIF, 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

{!! Alert::render() !!}

<table class="table">
    @include('users/partials/rows')
</table>

<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>

<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal">Eliminar</a>

@stop
