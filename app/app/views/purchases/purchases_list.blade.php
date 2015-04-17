
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Proveedor</th>
				<th>Total</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td><p class="btn btn-xs btn-link">{{$models->id}}</p></td>
					<td>{{$models->purchases_date}}</td>
					<td>{{$models->Providers->company_name}} : {{$models->Providers->last_name}} {{$models->Providers->name}}</td>
					<td>$ {{$models->amount}}</td>
					<td>
						<div class="btn-group btn-group-xs pull-right">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route('purchases_remito',$models->id)}}" target="self" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a>
						@endif
						@if(Roles::validate($modules_id,'delete'))
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
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