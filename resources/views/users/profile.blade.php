@extends('layouts.default')

@section('title') Perfil de usuario @stop

@section('slider')
    @include('layouts/partials/banner', [
        'titulo'    => $user->nombre,
        'subtitulo' => 'Perfil de usuario'
    ])
@stop

@section('content')

	<section class="about-company">
		<div class="container row">
			<div class="col8 two-thirds-tablet">
                <ul class="view-profile">
                    @include('users/partials/list')
	            </ul>
    		    {{-- 
                <table class="table">
			        @include('users/partials/rows')
			    </table>
                --}}
            </div>
            <div class="col4 one-third-tablet">
                <ul class="sub-menu">
                    <li><a href="{{ route('profile.edit') }}">Editar perfil de usuario</a></li>
                    <li><a href="{{ route('password.edit') }}">Cambiar clave de usuario</a></li>
                </ul>
            </div>
        </div>
    </section>

@stop

@section('scripts')
<script src="/assets/js/select2.min.js"></script>
<script src="/assets/js/select2_locale_es.js"></script>
@stop