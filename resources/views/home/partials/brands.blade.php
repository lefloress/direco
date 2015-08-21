<section class="brands">
	<div class="container row">
		<ul>
            @each('marcas/partials/list-item', $featured_marcas, 'marca')
		</ul>
        <div class="col12">
			<p class="txt-center"><a href="{{ route('marcas') }}" class="btn">Ver todas nuestras Marcas</a></p>
        </div>
	</div>
</section>