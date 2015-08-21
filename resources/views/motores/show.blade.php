@extends('layouts.default')

@section('title') Motores @stop
@section('description') Descripción catálogo @stop
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/assets/css/catalog.css">  
@stop

@section('slider')  
    @include('layouts/partials/banner', ['titulo' => 'Catálogo', 'subtitulo' => 'Repuestos de todos los tipos'])
@stop

@section('content')

    @include('layouts/partials/breadcrumb-catalog', ['marca' => $motor->modelo->marca, 'modelo' => $motor->modelo, 'motor' => $motor->descripcion, 'repuesto' => ''])

    <div class="catalog">
        <div class="container">
            <div class="col12">
                @include('layouts/partials/form-filter')    
                @foreach ($grupos as $grupo)
                    <article>
                        <header>
                            <h3><button><span class="icon-category icon-{{ $grupo->slug }}"></span> {{ $grupo->descripcion }} <span class="icon-more"></span></button></h3>
                            @foreach ($grupo->divisiones as $division)
                                <div class="tags">
                                    <h4>{{ $division->descripcion }}</h4>
                                    <ul>
                                        @foreach ($division->piezas as $pieza)
                                            <li>
                                                <a href="{{ $pieza->getUrlAttribute($motor) }}">
                                                    {{ $pieza->descripcion }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </header>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
    
@stop