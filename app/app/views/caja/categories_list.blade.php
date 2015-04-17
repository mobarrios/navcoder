<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>				
				<th>Fecha</th>
				<th>Tipo</th>
				<th>Descripción</th>
				<th>Ingreso</th>
				<th>Egreso</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>			
				@foreach($model  as $models)
				<tr>					
					<td>	{{$models->date}}</td>
					<td>	{{ $models->type}}</td>
					<td> 	{{$models->description}}</td>
					<td> $ 	{{$models->in}}</td>
					<td> $ 	{{$models->out}}</td>
					<td>
						<div class="btn-group btn-group-xs">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></a>
						@endif
						@if(Roles::validate($modules_id,'delete'))
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
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
