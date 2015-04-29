@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">{{$modulo}} : {{$seccion}}</h3>
			  </div>
			  <div class="panel-body">				

					{{Form::open(array('url'=>'additem', 'id'=>'form_add_item'))}}
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingTwo">
					        <h4 class="panel-title">
					          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="collapseTwo">
					          Datos
					          </a>
					        </h4>
					      </div>

					      <div id="2" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingTwo">
					        <div class="panel-body">    
					        	@if(Session::has('data'))
					        		<input type="text" value="{{Session::get('data')['date']}}" class="form-control" disabled>
					        	@else
					          		{{ Form::date('date') }}   
					          	@endif
					           <br>
					         	<input class="form-control" placeholder='Proveedor' id="provider_name" value="{{Session::get('data')['provider_name']}}" >
					         	<input type="hidden" name="provider_id" id="provider_id" data-id="">
					        </div>
					      </div>
					    </div>
					      <div class="panel panel-default">
					      <div class="panel-heading" role="tab" id="headingThree">
					        <h4 class="panel-title">
					          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
					            Articulos
					          </a>
					        </h4>
					      </div>
					      <div id="4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">  
					        <div class="panel-body">
								<div class="col-xs-12">
									<input class="form-control" placeholder='Articulo' id="item" data-id="">
									<input type="hidden" id="item_id" name="item_id" data-id="">
								</div>
								<hr>
								
								<div class="col-xs-2">
										<input class="form-control" placeholder='Cantidad' id='cantidad' name="cantidad">
									</div>
									<div class="col-xs-2">
										  <input class="form-control" placeholder='$' id='price' name="price_per_unit">
									</div>

									<div class="col-xs-8">
										<input class="form-control" placeholder='Observaciones' id='observations' name="observations">
									</div>
								<br>
								<br>

								<div class="col-xs-8">
									<a id='add_item' class='btn btn-xs btn-success'><span class="fa fa-plus"></span> Agregar </a>
								</div>
								{{Form::close()}}
					        </div>
					      </div>
					    </div>
					    <br>
					      <table class="table table-striped table-hover  table-responsive">
					    	<thead>
					    		<tr>
					    			<th>Cod.</th>
					    			<th>Cant.</th>
					    			<th>Articulo</th>
					    			<th>$ Unit.</th>
					    			<th>S. Total</th>
					    			<th></th>
					    		</tr>
					    	</thead>
					    	<tfoot>
					    		<tr>
					    			<td></td>
					    			<td></td>
					    			<td></td>
					    			<td><strong>Total</strong></td>
					    			<td> $ <strong>{{Session::get('array_total')}}</strong></td>
					    			<td></td>
					    		</tr>
					    	</tfoot>
					    	<tbody id='table_items_body'>
					    		@if(Session::has('array_items'))
					    			@foreach(Session::get('array_items') as $item => $key)
					    			<tr>
					    				<td>{{$key['code']}} </td> 
					    				<td>{{$key['cantidad']}}</td>	
					    				<td>{{$key['description']}}</td>
					    				<td> $ {{$key['$']}}</td>
					    				<td> $ {{$key['subtotal'] }}</td>	
					    				<td><a href="{{route('purchases_delitem', $item )}}" class="del_confirm pull-right"><i class="fa fa-remove"></i></a>
					    				
					    				</td>	    			
					    			</tr>
					    			@endforeach
					    		@endif
					    	</tbody>
					    	
					    </table>
					 
					 	 <hr>		 
					  <a href="{{route('sales_cancel')}}" id="cancel" class="del btn btn-danger">Cancelar</a>
					  <a id="process" class="btn btn-success">Procesar</a>
					  </div>
			  </div>
		</div>

		<!--- MODAL -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Content will be loaded here from "remote.php" file -->
				</div>
			</div>
		</div>
		<!-- END MODAL -->


	@endsection

	@section('js')
		<script type="text/javascript">
			    
				$('#process').on('click',function()
				{
					$.ajax({
						type: "GET",
						url: "process_purchases",
						dataType: "json",
						  success: function(data){
								if(data != null)
								{
									console.log(data);
									window.location.href = "inicio";
									window.open('remito_purchase/'+data , '_blank');	
									
								}
						 	},
							error: function (xhr, ajaxOptions, thrownError) {
								alert('Error:'+ xhr.status + thrownError );

							}                         
						});
				});

			     $("#provider_name").autocomplete({      
			     	 //source: "provider_search",
					source: function(request, response) {
					$.ajax({
					type: "POST",
					url: "provider_search",
					data:  {search : $("#provider_name").val() },
					dataType: "json",
						  success: function(data){
						//$.each(data, function(key, value) {
						//	console.log (key);
						//});
						response(data);
					},                            
					});

					},
					select: function(event, ui) {
					//setea el id al attr data-id del input  item
					$('#provider_id').val(ui.item.id);
					$('#provider_id').attr('data-id',ui.item.id);
					}
			  	 });
			    /*
				 $("#item").autocomplete({      
			     	 source: "item_search"
			  	 });
				*/
			
				$("#item").on('keypress',function()
				{
					if($('#provider_name').val() == "" )
					{
						alert("Completar Proveedor");
					}
					else
					{

						$("#item").autocomplete(
						{
		                    source: function(request, response) 
		                    {
		                        $.ajax(
		                        {
		                            type: "POST",
		                            url: "item_search",
		                            data:  
		                           	{
		                            	search : $("#item").val(), 
		                            	purchase : true,
		                            	providers_id : $('#provider_id').attr('data-id') 
		                            },
		                            dataType: "json",
		      						  success: function(data)
		      						  {
										//$.each(data, function(key, value) {
										//	console.log (key);
										//});
		                        		console.log(data);
										response(data);
		                              },                            
		                        });

		                    },
		                    select: function(event, ui) 
		                    {
		                   		//setea el id al attr data-id del input  item
		                   		$('#item_id').val(ui.item.id);
		                   		$('#item_id').attr('data-id',ui.item.id);
		                   		$('#price').val(ui.item.cost_price);
		                   		$('#cantidad').val(1);
		                	}
		                });
					 }
				});
				
				


				$('#del_item').on('click',function(){
					arr_item.splice(0,$(this).attr('data-id'));
					console.log(arr_item);
				});

 			
 				$('#add_item').on('click',function(){

 					if($('#provider_name').val() == "")
 					{
 						alert('Completar Proveedor');
 					}
 					else
 					{
 						$('#form_add_item').submit();
 					}
			  		

 				});
				//post by ajax add item
				/*
			  	 $('#add_item').on('click',function(){
			  		 $.ajax({  
			  		 	type: "POST",  
			  		 	url: "additem",  
			  		 	data: { item_id: $('#item').attr('data-id') , quantity: $('#cantidad').val() , discount:$('#dto').val() },  
			  		 	

			  		 	});
			  		 

			  	 	var item = $('#item').val();
			  	 	var cant = $('#cantidad').val();
			  	 	var dto  = $('#dto').val();

			  	 	var content = '<tr><td>'+cant+'</td><td>'+item+'</td><td>'+dto+'</td><td> $ </td></tr>';

			  	 	$('#table_items_body').append(content);			  	 	
			  	 });
				*/
				
		</script>
	@endsection
@stop