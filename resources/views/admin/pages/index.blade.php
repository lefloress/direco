@extends('admin/layout')

@section('content')

<h1>
    Páginas / {{ ucfirst($section) }}
    <a href="{{ route('admin.paginas.create', ['section' => $section]) }}" class="btn btn-primary">
        Nueva página
    </a>    
</h1>

{!! Alert::render() !!}        

@include('admin/pages/partials/table')
                
@stop 
