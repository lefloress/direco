@extends('layouts.default')

@section('title') Producto @stop
@section('description') Descripción producto @stop
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/assets/css/product.css">  
@stop

@section('slider')  
    @include('layouts/partials/banner', ['titulo' => 'Catálogo', 'subtitulo' => 'Repuestos de todos los tipos'])
@stop

@section('content')
	
	<section class="product">
		<div class="container row">
			<div class="col12">
				<h2>{{ $item->pieza }}</h2>
			</div>
			<div class="col6">	
				@include('items/partials/slider-images')				
			</div>
			<div class="col6">
				<!-- falta pasar la url -->
				@include('layouts/partials/share-buttons', ['nombre' => $item->pieza, 'url' => 'url'])
				<div class="detail-product">
					<h3>{{ $item }}</h3>
					<p>Código: <span>{{ $item->codigo }}</span></p>
					<!-- falta el precio -->
					<p><span class="price">BsF 19.997</span></p>
					@include('items/partials/info')
				</div>
				<div class="actions-product">
					<form action="#" class="form action-cart">
						<select name="amount" id="amount" class="select2">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<button class="btn"><span class="icon-cart white"></span> Agregar</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	@include('items/partials/equivalencias')

@stop

@section('scripts')
	<script src="/assets/js/jquery.flexslider-min.js"></script>	
	<script src="/assets/js/select2.min.js"></script>
	<script src="/assets/js/select2_locale_es.js"></script>	
@stop