<section class="home-banner">
	<div class="container row">
		<div class="col12">
			<h2>Somos más que una solución <br>Para tu vehículo</h2>
		</div>
		<form action="" class="form form-search">
			<fieldset>
				<div class="field-search">
					<input type="search" placeholder="Busca tu repuesto">
					<button type="submit"><span class="icon-search"></span></button>
					<ol>
						<li>Utilice pocas palabras. (Ej. Faro corola)</li>
						<li>Números de parte sin guiones ni espacios.</li>
					</ol>
				</div>
			</fieldset>
		</form>
		<button class="btn-transparent open-advanced-search">Seleccione Marca</button>
		<form action="" id="brand-combos" class="form form-advanced-search">
			<fieldset>
				<div class="field">
				    <select name="brand" id="brand" class="select2">
				    	<option>Seleccione Marca</option>
				    @foreach($marcas_list as $id => $nombre)
				        <option value="{{ $id }}">{{ $nombre }}</option>
				    @endforeach
				    </select>
				</div>
				<div class="field">
					<select name="model" id="model" class="select2" disabled="disabled">
						<option>Selecciona Modelo</option>
					</select>
				</div>
				<div class="field">
					<select name="motor" id="motor" class="select2" disabled="disabled">
						<option>Selecciona Motor</option>
					</select>
				</div>
			</fieldset>
		</form>
	</div>
</section>