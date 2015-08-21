	<footer class="footer row-top">
		<div class="foot-contacts">
			<a href="#contact" class="link-contact">¿No lo encuentras? Solicítalo aquí</a>
			<a href="tel:15551234567" class="link-tel">
				<span class="icon-tel"></span>(0241) 8534334
			</a>
			<a href="mailto:info@direco.com.ve?subject=Mail desde nuestro sitio web" class="link-email">
				<span class="icon-mail"></span>
				info@direco.com.ve
			</a>
		</div>
		<div class="foot-end">
			<div class="container row">
				<div class="col5 full">
					<div class="guarantee">
						<figure><img src="/assets/images/sticker.png" alt="100% garantizados" width="100"></figure>
						<h4>Productos 100% garantizados</h4>
						<p>Distribuimos repuestos automotrices de la mejor calidad y 100% nuevos para vehículos europeos, americanos y asiáticos.</p>
					</div>
				</div>
				<div class="col7 full">
					<ul>
						<li><a href="{{ route('paginas.show', 'servicios') }}">Servicios</a></li>
						<li><a href="{{ route('paginas.show', 'informacion') }}">Información</a></li>
						<li><a href="{{ route('marcas') }}">Catálogo</a></li>
						<li><a href="{{ route('contenido.show', 'promociones') }}">Promociones</a></li>
						<li><a href="{{ url('contactanos') }}">Ventas al mayor</a></li>
					</ul>
					<div class="copyright">
						<p>Direco, C.A. RIF: J-07536530-5 © 2014.</p>
						<p>Derechos reservados. Desarrollado por <a href="http://www.dessigual.com" target="_blank">Dessigual.</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
