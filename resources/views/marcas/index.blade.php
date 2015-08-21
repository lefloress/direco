@extends('layouts.default')

@section('title') Marcas @stop
@section('description') Descripción catálogo @stop

@section('slider')	
	@include('layouts/partials/banner', ['titulo' => 'Marcas', 'subtitulo' => 'Todas nuestras Marcas'])
@stop

@section('content')

	<section class="brands">
		<div class="container row-top">
			<div class="col12">
				<h3>Nuestras Marcas</h3>
				@include('layouts/partials/form-filter')
			</div>
			<ul>
            	@each('marcas/partials/list-item', $marcas, 'marca')
			</ul>
		</div>
	</section>

@stop	