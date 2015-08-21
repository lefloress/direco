@extends('layouts.default')

@section('title') {{ $content->titulo }} @stop
@section('description') {{ ucfirst($section) }} @stop

@section('stylesheets') 
	<link rel="stylesheet" type="text/css" href="/assets/css/news.css">
@stop

@section('content')

    <section class="banner">
		<div class="container">
			<div class="col12">
				<h2>{{ ucfirst($section) }}</h2>
				<p><a href="{{ route('contenido.index', $section) }}" class="btn-red">Volver a lista de {{ $section }}</a></p>
			</div>
		</div>
	</section>	
    
    <div class="container row-top">
		<div class="col12">
			<article class="note">
				<header>
					<h2>{{ $content->titulo }}</h2>
					<h4>{{ $content->fecha }}</h4>
				</header>
				<div class="txt-rich">
					<p>{!! $content->contenido !!}</p>
				</div>
				<div class="share-buttons">
					<a href="http://www.twitter.com/home?status={{ $content->titulo }}+{{ Request::url() }}" target="_blank" class="btn btn-twt">Twitter</a>
					<a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank" class="btn btn-fb">Facebook</a>
					<a href="https://plus.google.com/share?url={{ Request::url() }}" target="_blank" class="btn btn-gplus">Google +1</a>
				</div>
			</article>
		</div>
	</div>
	
@stop