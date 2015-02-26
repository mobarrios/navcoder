@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">{{$modulo}} : {{$seccion}}</h3>

					NRO :: {{Session::get('purchase_temporal_id')}}
			  </div>
			  <div class="panel-body">				
				
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
					           {{ Form::date('categories') }}   
					           <br>
					      
					         	<input class="form-control" placeholder='Proveedor' id="tags" name="tags">
				
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
									<input class="form-control" placeholder='Articulo' id="item" name="item" data-id="">
								</div>
								<hr>
								<div class="col-xs-2">
									<input class="form-control" placeholder='Cantidad' id='cantidad'>
								</div>
								<div class="col-xs-2">
									<input class="form-control" placeholder='Dto %' id='dto'>
								</div>
								<div class="col-xs-8">
									<a id='add_item' class='btn btn-success'> Agregar </a>
								</div>

					        </div>
					      </div>

					    </div>
					    <br>
					     <table class="table table-bordered table-hover">
					    	<thead>
					    		<tr>
					    			<th>#</th>
					    			<th>Articulo</th>
					    			<th>$ Unit.</th>
					    			<th>S. Total</th>
					    		</tr>
					    	</thead>
					    	<tbody id='table_items_body'>
					    	
					    	</tbody>
					    </table>
					  
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
			    
			     $("#tags").autocomplete({      
			     	 source: "provider_search",
			  	 });
			    /*
				 $("#item").autocomplete({      
			     	 source: "item_search"
			  	 });
				*/
			
				$("#item").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            type: "POST",
                            url: "item_search",
                            data:  {search : $("#item").val() },
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
                   		$('#item').attr('data-id',ui.item.id);
                	}

                });


			  	 $('#add_item').on('click',function(){
			  		 $.ajax({  
			  		 	type: "POST",  
			  		 	url: "{{Session::get('company')}}/additem",  
			  		 	data: { item_id: $('#item').attr('data-id') , quantity: $('#cantidad').val() , discount:$('#dto').val() },  
			  		 	success:  function(result){
        						console.log(result);
   						 }

			  		 	});
			  		 /*
			  	 	$.post("{{Session::get('company')}}/additem",function(data)
			  	 	{

			  	 		console.log(data);
			  	 	});	
*/

			  	 	var item = $('#item').val();
			  	 	var cant = $('#cantidad').val();
			  	 	var dto  = $('#dto').val();

			  	 	var content = '<tr><td>'+cant+'</td><td>'+item+'</td><td>'+dto+'</td><td> $ </td></tr>';

			  	 	$('#table_items_body').append(content);
			  	 	
			  	 });
		</script>
	@endsection
@stop