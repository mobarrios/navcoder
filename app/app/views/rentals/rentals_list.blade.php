
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Cliente</th>
				<th>Total</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach(Rentals::orderBy('rentals_to','DESC')->get() as $models)
				
				@if($models->rentals_to == '12-06-2015' )

					<tr style="background-color: #EFB73E">
				@else
					<tr>
				@endif

					<td><p class="btn btn-xs btn-link">{{$models->id}}</p></td>
					<td>{{$models->rentals_date}}</td>
					<td>{{$models->rentals_to}}</td>
					<td>{{$models->Clients->company_name}} : {{$models->Clients->last_name}} {{$models->Clients->name}}</td>
					<td>$ {{$models->amount}}</td>
					<td>
						<div class="btn-group btn-group-xs pull-right">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route('rentals_remito',$models->id)}}" target="self" class="btn btn-default"><i class="fa fa-print"></i></a>
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

	<label class="label label-warning">Proximos Vencimientos</label>

	<ul class="pagination">
		{{ $model->links() }}
	</ul>

</div>