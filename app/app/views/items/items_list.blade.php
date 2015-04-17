<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th width="10%"></th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Precio Costo</th>
				<th>Precio al publico</th>
				<th>Stock</th>
				
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>			
				@foreach($model as $models)
				<tr>
					<td>						
							@if(!is_null($models->image) && $models->image != "")
								<a href="{{ $models->image }}" target="_blank" class="thumbnail">
									<img src="{{ $models->image }}" width="100%">	
								</a>
							@else
								<a href="no_image.png" target="_blank">
									<img src="no_image.png" width="100%">	
								</a>
							@endif						
					</td>
					<td>{{$models->code}}</td>
					<td>{{$models->name}}</td>
					<td>$ {{$models->cost_price}}</td>
					<td>$ {{$models->sell_price}}</td>
					<td>{{$models->stock}} {{$models->um}} </td>
					<td>
						<div class="btn-group btn-group-xs">
						
								@if(Roles::validate($modules_id,'edit'))
									<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
								@endif

								@if(Roles::validate($modules_id,'delete'))
									<a href="{{route($ruta.'_delete',$models->id)}}" type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
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