@extends('layouts.default')

@section('title') {{ ucfirst($section) }} @stop
@section('description') {{ ucfirst($section) }} @stop

@section('stylesheets') 
	<link rel="stylesheet" type="text/css" href="/assets/css/news.css">
@stop

@section('content')

    <section class="banner">
		<div class="container">
			<div class="col12">
				<h2>{{ ucfirst($section) }}</h2>
				<p>Todas nuestras {{ $section }}</p>
			</div>
		</div>
    </section>

	<section class="news">
		<div class="container row-top">
            @foreach($content as $item)
            <div class="col6">
				<article class="cnt-tab">
					<figure><img src="assets/images/noticia-prueba/rectangle.jpg" width="100"></figure>
                    <h3>
                        <a href="{{ route('contenido.show', [$section, $item->slug_url])  }}">
                            {{ $item->titulo }}
                        </a>
                    </h3>
					<p>{{ Utils::resume($item->contenido, 75) }}</p>
				</article>
            </div>
            @endforeach
		</div>
	</section>

	<div class="pagination">
		<div class="container row-top">
			{!! $content->render() !!}
		</div>
	</div>

@stop