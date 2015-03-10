@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')
		
		<div class="jumbotron" style="background-color:white; height:400px ">
			
			<h2>{{$master->name}}</h2>
		  <div class="col-xs-3">
		  	<div class="thumbnail">
		  		<img src="assets/images/{{$master->logo}}" alt="">
		  	</div>

		  </div>
	
		</div>
		

	@endsection

@stop