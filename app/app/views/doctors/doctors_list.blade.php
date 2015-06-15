<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Contactos</th>
				<th>Matriculas</th>
				<th>Obra Social ( Plan )</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->dni}}</td>
					<td>{{$models->name}}</td>
					<td>{{$models->last_name}}</td>
					<td>
					@. : {{$models->email}} <br>
					Te. :{{$models->phone}} <br>
					cel. :{{$models->cell_phone}}
					</td>
					<td> 
					Nac : {{$models->matricula_nacional}}<br>
					Prov : {{$models->matricula_provincial}}
					</td>

					<td>
						<ul>
	
							@foreach($models->DoctorPlanes as $p)
								 <li>{{$p->Obras->name}}
								({{$p->name}})</li>
							@endforeach 
						
						
						</ul>
					</td>
					<td>
						<div class="btn-group btn-group-xs">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
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