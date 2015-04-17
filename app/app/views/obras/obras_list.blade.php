<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Cuit</th>
				<th>Nombre/Sigla</th>
				<th>Ubicación</th>
				<th>cp</th>
				<th>Tel/Fax</th>
				<th>Mail</th>
				<th>Cond.</th>
				<th>Obs.</th>	
				<th></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->cuit}}</td>
					<td>{{$models->name}}</td>
					<td>{{$models->address}} {{$models->city}}  {{$models->province}} </td>
					<td>{{$models->zip_code}}</td>
					<td>{{$models->telephone}} / {{$models->fax}}</td>
					<td>{{$models->email}}</td>
					<td>{{$models->iva_conditions}}</td>
					<td>{{$models->observations}}</td>
					
					<td>
						<div class="btn-group btn-group-xs">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i></a>
						@endif
						@if(Roles::validate($modules_id,'delete'))
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i></a>
						@endif
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