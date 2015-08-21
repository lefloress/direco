@extends('layouts.default')

@section('title') Contactanos @stop
@section('description') Contacto @stop

@section('stylesheets') 
	<link rel="stylesheet" type="text/css" href="/assets/css/contact.css">
@stop

@section('content')

	<section class="banner">
		<div class="container">
			<div class="col12">
				<h2>Contáctanos</h2>
			</div>
		</div>
	</section>

	<section class="get-in-touch">
		<div class="container row-top">
			<div class="col6">
				<h3>Escríbenos</h3>
		            {!! Form::open(array('url' => 'contactanos', 'class' => 'form form-contact')) !!}		
                    <fieldset> 
                        <div class="field field-required @if($errors->has('nombre')) field-error @endif">
    						<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="{{ old('nombre') }}">
                            {!! $errors->first('nombre', '<p class="message-error">:message</p>') !!}
						</div>
						<div class="field field-required @if($errors->has('correo')) field-error @endif">
							<label for="correo">Email</label>
							<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="{{ old('correo') }}">
                            {!! $errors->first('correo', '<p class="message-error">:message</p>') !!}
                        </div>
						<div class="field field-required @if($errors->has('telefono')) field-error @endif">
							<label for="telefono">Teléfono</label>
							<input type="tel" name="telefono" id="telefono" placeholder="código de área + número" value="{{ old('telefono') }}">
                            {!! $errors->first('telefono', '<p class="message-error">:message</p>') !!} 
                        </div>				
						<div class="field field-required @if($errors->has('empresa')) field-error @endif">
							<label for="empresa">Empresa</label>
                            <input type="text" name="empresa" id="empresa" value="{{ old('empresa') }}">
                            {!! $errors->first('empresa', '<p class="message-error">:message</p>') !!} 
						</div>				
						<div class="field field-required @if($errors->has('mensaje')) field-error @endif">
							<label for="mensaje">Mensaje</label>
                            <textarea name="mensaje" id="mensaje" placeholder="Escribe tú mensaje">{{ old('mensaje') }}</textarea>
                            {!! $errors->first('mensaje', '<p class="message-error">:message</p>') !!} 
                        </div>										
						<div class="field-submit">
							<button type="submit" class="btn">Enviar</button>
						</div>
					</fieldset>
                {!! Form::close() !!}
			</div>
			<div class="col6">
				<figure><img src="assets/images/attention-customer.jpg" alt="Atención al Cliente" width="220"></figure>
				<div class="box">
					<p class="pre">Puede hacer sus pedidos directamente por teléfono de Lunes a Viernes de 8:00 am a 1:00 pm y de 2:00 pm a 5:00 pm, Sábados y Domingos libres, notificar su pago por esta misma vía.</p>
					<p>¿Como visualizo los precios de venta?</p>
					<p>¿Tiene alguna pregunta o duda antes de hacer su pedido?</p>
					<p>¿Le gustaría saber cuándo le será entregado su pedido? (Consulte nuestra sección Formas de Pago y envío)</p>
					<p>¿Qué repuesto es compatible con mi vehículo?</p>
					<p>¿Tiene sugerencias sobre nuestra Web que quiera transmitirnos?</p>
					<p>¡Su opinión nos interesa!</p>
				</div>
			</div>
		</div>
		<div class="container row-top">
			<div class="col12">
				<h3>Nos encontramos</h3>	
				<div class="address box" itemscope itemtype="http://schema.org/Organization">
					<address class="adr" itemprop="address">Av. Escalona entre Michelena y Rangel, local 91-8, Sector La Candelaria, al lado de la E/S. Escalona. Valencia, Edo. Carabobo</address>
					<p itemprop="telephone">
						<strong>Teléfonos Locales:</strong>
						(0241) 
						<a href="tel:02418534334">853.43.34</a> / 
						<a href="tel:02418534909">853.49.09</a> /
						<a href="tel:02418358455">835.84.55</a> /
						<a href="tel:02418978525">897.85.25</a> /
					 	<a href="tel:02418532582">853.25.82</a> /
					 	<a href="tel:02418313489">831.34.89</a> /
					 	<a href="tel:02418357307">835.73.07</a>
						<strong>Teléfonos Celulares:</strong>
						<a href="tel:04144122382">(0414) 412.23.82</a> /
						<a href="tel:04124412554">(0412) 4412554</a> /
						<a href="tel:04163307273">(0416) 3307273</a> 
					</p>
					<p itemprop="email"><strong>Email: </strong><a href="mailto:info@direco.com.ve?subject=Mail desde nuestro sitio web">info@direco.com.ve</a></p>
				</div>					
				<div class="map">
					<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps/ms?ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=209629707264846033874.000491f368fc77c3feff6&amp;source=embed&amp;t=m&amp;ll=10.173392,-68.009958&amp;spn=0.00697,0.009645&amp;iwloc=000491f36c985cabf0bf5&amp;output=embed"></iframe>				
				</div>		
			</div>			
		</div>
	</section>



@stop

@section('scripts')
<script src="/assets/js/select2.min.js"></script>
<script src="/assets/js/select2_locale_es.js"></script>
@stop
