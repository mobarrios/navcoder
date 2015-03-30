<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Mail</th>
				<th>Tel.</th>
				<th>Cel.</th>
				<th>Matricula</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->dni}}</td>
					<td>{{$models->name}}</td>
					<td>{{$models->last_name}}</td>
					<td>{{$models->email}}</td>
					<td>{{$models->phone}}</td>
					<td>{{$models->cell_phone}}</td>
					<td>{{$models->license}}</td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i></a>
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i></a>
						</div>
					</td>
				</tr>
				@endforeach

		</tbody>
	</table>

	<ul class="pagination">
		{{ $model->links() }}
	</ul>

</div>