@extends('template')
	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title"></h3>
			  </div>
			  <div class="panel-body">				
			
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Modelo</th>
								<th>Read</th>
								<th>Edit</th>
								<th>Add</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							
								@foreach($modulos as $modulo)
								<tr>
									<td>{{$modulo->name}}</td>

									{{$permissions}}
								</tr>
								@endforeach
							
						</tbody>
					</table>
				</div>
			  </div>
		</div>

	
	@endsection

	@section('js')
		
	@endsection
@stop