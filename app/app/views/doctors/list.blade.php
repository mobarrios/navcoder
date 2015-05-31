<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>{{Lang::get('doctor.name')}}</th>
				<th>{{Lang::get('doctor.lastName')}}</th>
				<th>{{Lang::get('doctor.email')}}</th>
				<th>{{Lang::get('doctor.phoneNumber')}}</th>
				<th>{{Lang::get('doctor.cellPhoneNumber')}}</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->name}}</td>
					<td>{{$models->last_name}}</td>
					<td>{{$models->email}}</td>
					<td>{{$models->phone}}</td>
					<td>{{$models->cell_phone}}</td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="{{route($editPathMethodGet,$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
							<a href="{{route($deletePathMethodGet,$models->id)}}" type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
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