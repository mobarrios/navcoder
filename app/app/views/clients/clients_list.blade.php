<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Empresa</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Mail</th>
				<th>Tel.</th>
				<th>Cel.</th>
				<th>CUIT</th>
				<th>C.C.</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->company_name}}</td>
					<td>{{$models->name}}</td>
					<td>{{$models->last_name}}</td>
					<td>{{$models->email}}</td>
					<td>{{$models->phone}}</td>
					<td>{{$models->cell_phone}}</td>
					<td>{{$models->ciut}}</td>
					<td><a href="{{route('clients_cc', $models->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-money"></i></a></td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
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