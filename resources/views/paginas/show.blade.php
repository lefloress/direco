@extends('layouts.default')

@section('title') Paginas / {{ $page->titulo }} @stop
@section('description') Pagina @stop

@section('slider')
    @include('layouts/partials/banner', [
        'titulo'    => $page->titulo,
        'subtitulo' => ucfirst($section)
    ])
@stop

@section('content')

	<section class="about-company">
		<div class="container row">
			<div class="col8 two-thirds-tablet">
			    <p>{!! $page->contenido !!}</p>
            </div>
            <div class="col4 one-third-tablet">
                <ul class="sub-menu">
                @foreach($other_pages as $item)
                    <li>
                        <a href="{{ route('paginas.show', ['section' => $section, 'url' => $item->slug_url]) }}">
                            {{ $item->titulo }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </section>
	
@stop

@section('scripts')
<script src="/assets/js/select2.min.js"></script>
<script src="/assets/js/select2_locale_es.js"></script>
@stop
