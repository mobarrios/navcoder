<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>{{Lang::get('client.company')}}</th>
				<th>{{Lang::get('client.name')}}</th>
				<th>{{Lang::get('client.lastName')}}</th>
				<th>{{Lang::get('client.email')}}</th>
				<th>{{Lang::get('client.phoneNumber')}}</th>
				<th>{{Lang::get('client.cellPhoneNumber')}}</th>
				<th>{{Lang::get('client.cuit')}}</th>
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
					<td>{{$models->cuit}}</td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="{{route($editPathMethodGet,$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
							<a href="{{route($deletePathMethodGet,$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
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