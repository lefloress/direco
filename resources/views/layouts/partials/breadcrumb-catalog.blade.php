<div class="breadcrumb">
	<div class="container">
		<div class="col12">
			<ul>
				@if ($marca)
					<li><a href="{{ route('marcas') }}">Marca:</a> <span> {{ $marca }}</span></li>
				@endif
				@if ($modelo)
					<li><a href="#modelo">Modelo:</a> <span> {{ $modelo }}</span></li>
				@endif
				@if ($motor)
					<li><a href="#catalogo-motor">Motor:</a> <span> {{ $motor }}</span></li>
				@endif
				@if ($repuesto)
					<li><a href="#repuestos">Repuesto:</a> <span> {{ $repuesto }}</span></li>
				@endif
			</ul>
		</div>
	</div>
</div>