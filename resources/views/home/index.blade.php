@extends('layouts.default')

@section('title') Página de Inicio @stop
@section('description') Descripción página de inicio @stop
@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/assets/css/home.css">	
@stop

@section('slider')
	@include('home/partials/banner')
@stop

@section('content')

	@include('home/partials/brands')

@stop

@section('scripts')
	<script src="/assets/js/select2.min.js"></script>
	<script src="/assets/js/select2_locale_es.js"></script>
@stop