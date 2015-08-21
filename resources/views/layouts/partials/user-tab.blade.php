				<div class="user-tab">
				@if(Auth::guest())
					<button class="open-form">
						<span class="copy-text">Entrar</span>
						<span class="icon-user"></span>
					</button>
					<a href="{{ route('register') }}" class="btn">Regístrate</a>
					{!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => "form form-login"]) !!}
						<fieldset>
							<div class="field">
								<input name="email" type="text" placeholder="Correo eletrónico">
							</div>
							<div class="field">
								<input name="clave" type="password" placeholder="Contraseña">
							</div>
							<div class="field-submit">
								<button type="submit" class="btn">Iniciar Sesión</button>
								<p>
								    <a href="{{ url('recuperar-contrasena/email') }}">
								        Olvidé mi Contraseña
								    </a>
								</p>
							</div>
						</fieldset>
					{!! Form::close() !!}
				@else
					<p class="username">
						<a href="{{ route('profile') }}">{{ Auth::user()->nombre }}</a>
						<a href="{{ route('orders.index') }}"><span class="icon-cart"></span></a>
						<a href="{{ url('logout') }}"><span class="icon-logout"></span></a>
					</p>
				@endif
				</div>