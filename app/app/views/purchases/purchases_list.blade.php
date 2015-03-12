
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Proveedor</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td><p class="btn btn-xs btn-link">{{$models->id}}</p></td>
					<td>{{$models->purchases_date}}</td>
					<td>{{$models->Providers->name}}</td>
					<td>$ {{$models->amount}}</td>
					<td>
						<div class="btn-group btn-group-xs pull-right">
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i></a>
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i></a>
							<a href="{{route('purchases_remito',$models->id)}}" target="self" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a>
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