@extends('template')
	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">{{$modulo}} : {{$seccion}}</h3>
			  </div>
			  <div class="panel-body">				
				<div class="row">
					{{Form::open(array('url'=> 'buscar_sales'))}}
						<div class="col-xs-12">
							<div class="col-xs-2"> {{Form::date('from')}}</div>		
							<div class="col-xs-2"> {{Form::date('to')}}</div>
							<button class="btn "><span class="fa fa-search"></span></button>
						</div>
					{{Form::close()}}
					
						@yield('extra')
				</div>
				<hr>
				@include($ruta.'/'.$ruta.'_list')
			  </div>
		</div>

		<!--- MODAL -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Content will be loaded here from "remote.php" file -->
				</div>
			</div>
		</div>
		<!-- END MODAL -->

		
	@endsection

	@section('js')
		<script type="text/javascript">

			$('body').on('hidden.bs.modal', '.modal', function () {
				$(this).removeData('bs.modal');
			});
		</script>
	@endsection
@stop