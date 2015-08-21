@extends('layouts.default')

@section('title') Piezas @stop
@section('description') Descripción catálogo @stop
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/assets/css/catalog.css">  
@stop

@section('slider')  
    @include('layouts/partials/banner', ['titulo' => 'Catálogo', 'subtitulo' => 'Repuestos de todos los tipos'])
@stop

@section('content')

    @include('layouts/partials/breadcrumb-catalog', ['marca' => $motor->modelo->marca, 'modelo' => $motor->modelo, 'motor' => $motor, 'repuesto' => $pieza])

    <section class="list-product">
        <div class="container row-top">
            <div class="col12">
                @foreach($items as $item)
                <article>
                    <h3><a href="{{ $item->url }}">{{ $item }}</a></h3>
                    <p>Código: {{ $item->codigo }}</p>
                    @include('items/partials/info')
                    @include('items/partials/images')
                </article>  
                @endforeach
            </div>
        </div>
    </section>

@stop