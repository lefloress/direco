@extends('admin/layout')

@section('content')

<h1>
    Noticias
    <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary">
        Nueva noticia
    </a>    
</h1>

{!! Alert::render() !!}        
      
@if($news->total() > 0)       
      
    @include('admin/pagination.info', ['pager' => $news, 'plural' => 'noticias'])
      
    @include('admin/news/partials/table')
      
    @include('admin/pagination.links', ['pager' => $news])

@else
            
    {{-- @include('admin/pagination.no-results') --}}
                
@endif
                
@stop 
