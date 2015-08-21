@extends('admin/layout')

@section('content')

<h1>
    Contactos
</h1>

{!! Alert::render() !!}
      
@if($contactos->total() > 0)       
      
    @include('admin/pagination.info', ['pager' => $contactos, 'plural' => 'contactos'])
      
    @include('admin/contactos/partials/table')
      
    @include('admin/pagination.links', ['pager' => $contactos])

@else
            
    {{-- @include('admin/pagination.no-results') --}}
                
@endif
                
@stop 
