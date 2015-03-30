<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>				
				<th>Nombre</th>
				<th class="actio_row"></th>
			</tr>
		</thead>
		<tbody>			
				@foreach($model  as $models)
				<tr>					
					<td>{{$models->name}}</td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
