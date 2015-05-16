
<?php 
	
	$month = 5;
	$year  = 2015;

	$dias = array('Do','Lu','Ma','Mi','Ju','Vi','Sa');
?>


<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
				<th>Rooms</th>
				@foreach(Calendar::draw_calendar($month,$year) as $num => $day) 
					<th>{{$dias[$day]}} {{$num}}</th>
				@endforeach		
			</tr>
		</thead>
		<tbody>
			
				@foreach(Rooms::all() as $room) 
					<tr>
						<td>{{$room->name}}</td>
						@foreach(Calendar::draw_calendar($month,$year) as $num => $day) 
					
							@if($room->AvailablesDay($year, $month , $num))
								<th style="background-color: #D9831F" class="day" id="{{$room->id}}-{{$day}}{{$month}}{{$year}}"></th>
							@else
								<th class="day" id="{{$room->id}}-{{$day}}{{$month}}{{$year}}"></th>
							@endif
						@endforeach		
					</tr>
				@endforeach			

		</tbody>
	</table>


</div>

