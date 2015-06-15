SANCUS
{{Form::texto('name','Nombre Cliente')}}
{{Form::texto('last_name','Apellido Cliente')}}
{{Form::texto('dni','DNI (Documento Nacional de Identidad)')}}
{{Form::texto('address','Dirección')}}
{{Form::texto('email','Email')}}
{{Form::texto('phone','Tel. Cliente')}}
{{Form::texto('cell_phone','Cel. Cliente')}}
{{Form::texto('company_name','Empresa')}}
{{Form::texto('cuit','CUIT Cliente')}}

	<div class="row">
		<div class="col-xs-12">
			<label class="control-label">Obra Social</label>
		</div>
		<div class="col-xs-12">
			<select name="obras_sociales_planes_id" class="form-control">
				@foreach(Obras::orderBy('name','DESC')->get() as $obras )
					<optgroup label = "{{$obras->name}}">
						@foreach($obras->Planes as $plan)
							@if(!is_null(Form::getValueAttribute('obras_sociales_planes_id')))
								@if(Form::getValueAttribute('obras_sociales_planes_id') == $plan->id )
									<option selected value="{{$plan->id}}">{{$plan->name}}</option>
								@else
									<option value="{{$plan->id}}">{{$plan->name}}</option>
								@endif
					       	@else
								<option value="{{$plan->id}}">{{$plan->name}}</option>
							@endif
						@endforeach
					</optgroup>
				@endforeach
			</select>
		</div>
	</div>

