@extends('layouts.default')

@section('title') Página de Inicio @stop
@section('description') Descripción página de inicio @stop
@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/assets/css/home.css">
@stop

@section('content')

    {!! Html::banner('Carrito de compra') !!}
	<section class="cart">
		<div class="container row-top">
			<div class="col12">
				<h3>Carrito de Compra</h3>
				<table class="table table-order">
					<thead>
						<tr>
							<th>Código</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Acciones</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>109717</td>
							<td>Estop Eje Mando CH Corsa 1300/1400/160090465688</td>
							<td>1</td>
							<td>
								<a href="#edit" class="lnk-act"><span class="icon-edit"></span></a>
								<a href="#delete" class="lnk-act"><span class="icon-delete"></span></a>
							</td>
							<td>BsF. 1800,00</td>
						</tr>
						<tr>
							<td>109717</td>
							<td>Estop Eje Mando CH Corsa 1300/1400/160090465688</td>
							<td>1</td>
							<td>
								<a href="#edit" class="lnk-act"><span class="icon-edit"></span></a>
								<a href="#delete" class="lnk-act"><span class="icon-delete"></span></a>
							</td>
							<td>BsF. 1800,00</td>
						</tr>
						<tr>
							<td>109717</td>
							<td>Estop Eje Mando CH Corsa 1300/1400/160090465688</td>
							<td>1</td>
							<td>
								<a href="#edit" class="lnk-act"><span class="icon-edit"></span></a>
								<a href="#delete" class="lnk-act"><span class="icon-delete"></span></a>
							</td>
							<td>BsF. 1800,00</td>
						</tr>
					</tbody>
				</table>
				<div class="total-price">
					<p><span class="namespace">Precio total </span><span class="amount">BsF. 5400,00</span></p>
				</div>
			</div>
		</div>
	</section>
	<section class="client">
		<div class="container row-top">
			<div class="col12">
				<h3>Datos del Cliente</h3>
				<ul>
					<li><strong>Nombre: </strong>Nombre del cliente</li>
					<li><strong>Email: </strong>hola@correo.com</li>
					<li><strong>Rif: </strong>V-12232432-9</li>
					<li><strong>Teléfono Local: </strong>0212-255-55-55</li>
					<li><strong>Celular: </strong>0414-288-88-88</li>
				</ul>
			</div>
			<div class="col12">
				<h3>Datos Fiscales</h3>
				<ul>
					<li><strong>Dirección: </strong>Avenida / Calle / Esquina / Carrera / Edificio / Residencia / Quinta / Local / Piso / Nivel / Apartamento / Oficina / Urbanización / Zona / Sector / Puntos de referencia</li>
					<li><strong>Municipio: </strong>Sucre</li>
					<li><strong>Estado: </strong>Miranda</li>
					<li><strong>Zona Postal: </strong>1090</li>
				</ul>
			</div>
		</div>
	</section>
	<section class="delivery">
		<div class="container row-top">
			<div class="col12">
				<h3>Instrucciones de despacho en caso de compra:</h3>
				<form action="#" class="form form-address">
					<fieldset>
						<div class="field field-required">
							<label for="deliver">Entregar a</label>
							<select name="deliver" id="deliver" class="select2">
								<option>Selecciona una Dirección</option>
								<option value="1">Dirección fiscal</option>
								<option value="1">Cliente retira</option>
								<option value="1">Agregar otra dirección</option>
							</select>							
						</div>
						<div class="field-submit">
							<a href="catalogo.html" class="btn">Volver al Catálogo</a>
							<a href="#historial-compras" class="btn">Historial de Compras</a>						
							<button type="submit" class="btn-red omega colr">Confirmar Compra</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>

@stop

@section('scripts')
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/select2_locale_es.js"></script>
@stop