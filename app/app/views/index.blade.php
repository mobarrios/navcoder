@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')
		<h4>Bienvenido</h4>
		<h3>Empresa : {{Session::get('company')}}</h3>
		<h4>Usuario : {{Auth::user()->name}}</h4>
	@endsection

@stop