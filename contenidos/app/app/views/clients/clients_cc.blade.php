@extends('template')
	
	@section('menu')
		@include('menu')
	@endsection

	@section('content')

	
<div class="panel panel-info">
	  <div class="panel-heading">
			<h4 class="panel-title">Cuenta Corriente </h4>
	  </div>
	  <div class="panel-body">

<address>
<strong>{{$client->company_name}}</strong><br>
{{$client->name}}, {{$client->last_name}}<br>
{{$client->address}}<br>

<abbr title="Phone">P:</abbr>{{$client->phone}} {{$client->cell_phone}}
<br>
<a href="mailto:#">{{$client->email}}</a>
</address>

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Ventas</th>
							<th>$ Ventas</th>
							<th>$ Pagos</th>
							<th>Cta. Cte</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$client->Sales->count()}}</td>
							<td>$ {{$client->Sales->sum('amount')}}</td>
							<td>$ {{$client->ClientsPayment->sum('amount')}}</td>
							<td>$ {{$client->Sales->sum('amount') - $client->ClientsPayment->sum('amount')}} </td>
						</tr>
					</tbody>
				</table>
			</div>

	  </div>
</div>
			
	


	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		@foreach($client->Sales as $sale)
		<?php $cc = $cc + $sale->amount ?>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		        <a data-toggle="collapse" data-parent="#accordion" href="#{{$sale->id}}" aria-expanded="true" aria-controls="collapseOne">
		        Nro . {{$sale->id}}
		        <b class='pull-right'>{{$sale->sales_date}}</b>
		        </a>
		     
		    </div>
		    <div id="{{$sale->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Cod.</th>
								<th>Cant.</th>
								<th>Articulo</th>
								<th>Observ.</th>
								<th>P.Unit.</th>
								<th class="action_row">Total</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($sale->SalesItems as $item)
							<tr>
								<td>{{$item->Items->code}}</td>
								<td>{{$item->quantity}}</td>
								<td>{{$item->Items->name}} {{$item->Items->description}}</td>
								<td>{{$item->observations}}</td>
								<td>$ {{$item->price_per_unit}}</td>
								<td>$ {{$item->price_per_unit * $item->quantity}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Detalle</th>
								<th>Tipo</th>
								<th></th>
								<th></th>
								<th class="action_row">Total</th>
							</tr>
						</thead>
						<tbody>
							
							
							@foreach($sale->ClientsPayment as $pay)
							<tr>
								<td>{{$pay->date}}</td>
								<td>{{$pay->detail}}</td>
								<td>{{$pay->payment_method}}</td>
								<td></td>
								<td></td>
								<td> $ {{$pay->amount}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
				<a id="add_pay" class="btn btn-xs btn-success" sales-id="{{$sale->id}}" clients-id="{{$client->id}}" >Agregar Pago</a>
		      </div>
		    </div>
		  </div>		
		@endforeach
	</div>	


	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Agragar Pago</h4>
				</div>
				<div class="modal-body">
					{{Form::open(array('route'=>'clients_post_payment'))}}

					{{Form::date('date','Fecha')}}
					{{Form::texto('detail','Detalle')}}
					{{Form::pay_method('payment_method','Forma de Pago')}}
					{{Form::texto('amount','Total')}}

					{{Form::hidden('sales_id',null,array('id'=>'sales_id'))}}

					{{Form::hidden('clients_id',null,array('id'=>'clients_id'))}}
		
				</div>
				<div class="modal-footer">
					{{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
					{{Form::close()}}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endsection

@section('js')
	<script type="text/javascript">
		$('#add_pay').on('click',function(){
			$('#sales_id').val($(this).attr('sales-id'));
			$('#clients_id').val($(this).attr('clients-id'));
			
			$('#modal-id').modal('show');
		});	
	</script>
@endsection
@stop