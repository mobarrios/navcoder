
<div class="table-responsive">
	<table class="table table-hover table-condensed ">
		<thead>
			<tr>
				<th>#</th>
				<th>in</th>
				<th>out</th>
				<th>Pax</th>
				<th>Cant. Pax</th>
				<th>Tipo de Habitaión</th>
				<th>$</th>
				<th></th>

			</tr>
		</thead>
		<tbody>
			
				@foreach(Reservations::all() as $reservation) 
					<tr>
						<td>{{$reservation->id}}</td>
						<td>{{$reservation->from}}</td>
						<td>{{$reservation->to}}</td>
						<td>{{$reservation->Paxs->last_name}} {{$reservation->Paxs->name}}</td>
						<td></td>
						<td>{{$reservation->Types->name}}</td>
						<td>{{$reservation->currency}} {{$reservation->total}}</td>
						<th><span class="label label-info">{{$reservation->status}}</span></th>
					</tr>
				@endforeach			

		</tbody>
	</table>


</div>
	
