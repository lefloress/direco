@extends('admin/layout')

@section('content')

<h1>
    Usuarios
    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">
        Nuevo usuario
    </a>
</h1>

{!! Alert::render() !!}

@include('admin/users/partials/filters')

@if($users->total() > 0)

    @include('admin/pagination.info', ['pager' => $users, 'plural' => 'usuarios'])

    @include('admin/users/partials/table')

    @include('admin/pagination.links', ['pager' => $users])

@else

    {{-- @include('admin/pagination.no-results') --}}

@endif

@stop