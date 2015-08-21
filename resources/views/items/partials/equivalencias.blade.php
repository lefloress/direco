<section class="compatible-product">
	<div class="container row-top">
		<div class="col12">
			<h3>Compatible con:</h3>
			@foreach ($equivalencias as $motor)
				<article>
					<figure><img src="{{ $motor->modelo->marca->logo }}" alt="{{ $motor->modelo->marca }}" width="100"></figure>
						<h3>{{ $motor->modelo->marca }} {{ $motor->modelo }}</h3>	
						<p><a href="{{ $motor->url }}">{{ $motor }}</a></p>
				</article>							
			@endforeach	
		</div>
	</div>
</section>