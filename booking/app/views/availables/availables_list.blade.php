
<?php 
	
	$month = 10;
	$year  = 2015;

	$dias = array('Do','Lu','Ma','Mi','Ju','Vi','Sa');
?>

<form action="" >
	<select name="month" >
		<option value="1" >Enero</option>
		<option value="2">Febrero</option>
		<option value="3">Marzo</option>
		<option value="4">Abril</option>
		<option value="5">Mayo</option>
		<option value="6">Junio</option>
		<option value="7">Julio</option>
		<option value="8">Agosto</option>
		<option value="9">Septiembre</option>
		<option value="10">Octubre</option>
		<option value="11">Noviembre</option>
		<option value="12">Diciembre</option>
	</select>
	<select name="year" >
		<option value="2015">2015</option>
		<option value="2016">2016</option>
		<option value="2017">2017</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		<option value="2020">2020</option>
		<option value="2021">2021</option>
		<option value="2022">2022</option>
		<option value="2023">2023</option>
		<option value="2024">2024</option>
		<option value="2025">2025</option>
	</select>
	<input type="submit" value="ir">
</form>

<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
				<th>Types</th>
				@foreach(Calendar::draw_calendar($month,$year) as $num => $day) 
					<th>{{$dias[$day]}} {{$num}}</th>
				@endforeach						
			</tr>
		</thead>
		<tbody>

			@foreach(Rooms::OrderBy('types_id','ASC')->get() as $room) 
				<tr>
					<td><strong>{{$room->name}}</strong> {{$room->Types->name}}</td>

					@foreach(Calendar::draw_calendar($month,$year) as $num => $day) 
						
						@if($room->AvailablesDay($year, $month , $num , $room->id))
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
	<div class="label label-danger" >Disponible Web</div>



