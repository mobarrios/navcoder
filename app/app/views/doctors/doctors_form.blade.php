{{Form::texto('name','Nombre del Doctor')}}
{{Form::texto('last_name','Apellido del Doctor')}}
{{Form::texto('dni','DNI (Documento Nacional de Identidad)')}}
{{Form::texto('email','Email')}}
{{Form::texto('phone','Tel. Doctor')}}
{{Form::texto('cell_phone','Cel. Doctor')}}
{{Form::texto('matricula_nacional','Matricula Nacional')}}
{{Form::texto('matricula_provincial','Matricula Provincial')}}


<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Obra Social</th>
				<th>Plan</th>

			</tr>
		</thead>
		<tbody>
			
				@foreach(Obras::orderBy('name','DESC')->get() as $obras )
				<tr>
					<td>
				{{$obras->name}}</td>
					<td>
					@foreach($obras->Planes as $plan)
						<li>
						<input type="checkbox" name="planes_id[{{$plan->id}}]" class="planes_obras_{{$obras->id}}"> {{$plan->name}}</li>
					@endforeach
					</td>
				</tr>
				@endforeach
			
		</tbody>
	</table>
</div>


<script type="text/javascript">

	$('.obras_id').on('click',function(){
		
		var id = ($(this).attr('data-id'));

		if($(this).prop('checked'))
		{
				$('.planes_obras_'+id).attr('disabled',false);
		}
		else
		{
				$('.planes_obras_'+id).attr('checked',false);
				$('.planes_obras_'+id).attr('disabled',true);
		}

	
	});
</script>
	
