@extends('admin/layout')

@section('content')

<h1>
    Contenido / {{ ucfirst($section) }}
    <a href="{{ route('admin.contenido.create', ['section' => $section]) }}" class="btn btn-primary">
        Nueva {{ $section }}
    </a>    
</h1>

{!! Alert::render() !!}        

@include('admin/content/partials/table')
                
@stop 
