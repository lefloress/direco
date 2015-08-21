@extends('layouts.default')

@section('title') Marcas @stop
@section('description') Descripción catálogo @stop
@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/assets/css/catalog.css">	
@stop

@section('slider')	
	@include('layouts/partials/banner', ['titulo' => 'Catálogo', 'subtitulo' => 'Repuestos de todos los tipos'])
@stop

@section('content')

	@include('layouts/partials/breadcrumb-catalog', ['marca' => $marca->nombre, 'modelo' => '', 'motor' => '', 'repuesto' => ''])

	<section class="catalog">
		<div class="container">
			<div class="col12">
				@include('layouts/partials/form-filter')			
				@foreach ($marca->modelos as $modelo)
					<article>
						<header>
							<h3><button>{{ $modelo->descripcion }} <span class="icon-more"></span></button></h3>
						</header>
						<div class="tags">
							<h4>Selecciona Motor</h4>
							<ul class="motors">
								@foreach ($modelo->motores as $motor)
									<li>
										<a href="{{ $motor->getUrlAttribute($modelo, $marca) }}">
											{{ $motor->descripcion }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</article>
				@endforeach
			</div>
		</div>
	</section>

@stop	