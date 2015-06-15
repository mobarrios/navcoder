
<?php 
	
	$month = 5;
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

			@foreach(Types::OrderBy('name','ASC')->get() as $type) 
				<tr>
					<td><strong>{{$type->name}}</strong> </td>
					@foreach(Calendar::draw_calendar($month,$year) as $num => $day) 
						<?php  
							$av  = Availables::where('from','=',$year.'-'.$month.'-'.$num)->where('types_id','=',$type->id)->first() 
						?>
						@if($av )
							@if($av->quantity != 0)
								<th style="background-color: #D9831F" class="day" id="{{$av->id}}-{{$day}}{{$month}}{{$year}}" title="{{$av->currency}} {{$av->price}}">{{$av->quantity}}</th>
							@else
								<th style="background-color: #469408" class="day" id="{{$type->id}}-{{$day}}{{$month}}{{$year}}"></th>
							@endif
						@else
							<th class="day" id="{{$type->id}}-{{$day}}{{$month}}{{$year}}"></th>
						@endif
					@endforeach		
				</tr>
			@endforeach			

		</tbody>
	</table>


</div>
	<div class="label label-danger" >Disponible Web</div>
	<div class="label label-success" >Reservado Web</div>



