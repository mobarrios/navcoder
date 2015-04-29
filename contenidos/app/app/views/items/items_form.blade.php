  
  {{Form::texto('code','Codigo')}}
  {{Form::texto('provider_code','Codigo Proveedor')}}
  {{Form::texto('name','Nombre')}}
  {{Form::texto('description','Descripcion')}}
  {{Form::providers('providers_id','Proveedor')}}

  {{Form::brands('brands_id','Marca')}}
   
  {{ Form::texto('sell_price','Precio de venta','0.01', '0') }} 
  {{ Form::texto('rent_price_15_days','Precio de alquiler por 15 dias','0.01', '0') }} 
  {{ Form::texto('rent_price_45_days','Precio de alquiler por 45 dias','0.01', '0') }}

  <br/>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#1" aria-expanded="false" aria-controls="collapseTwo">
          Costos por Proveedores
          </a>
        </h4>
      </div>
      <div id="1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">      
         <table class="table table-hover">
           <thead>
             <tr>
                <th></th>
                <th>Proveedor</th>
                <th>Precio de Compra</th>
             </tr>
           </thead>
           <tbody>
        
             @foreach(Providers::orderBy('name','DESC')->get() as $proveedor)
               <tr>

                   @if(isset($model_edit))

                    <?php $it = ItemsProviders::where('items_id','=',$model_edit->id)->where('providers_id','=',$proveedor->id)->first() ; ?>
  
                      @if($it)
                           <td>
                              <input type="checkbox" class="check" data-id="{{$proveedor->id}}" name="check[{{$proveedor->id}}]" checked>
                            </td>
                            <td>
                              {{$proveedor->name}}
                            </td>
                            <td>
                              $ <input type="text" name="cost_{{$proveedor->id}}" class="cost_{{$proveedor->id}}" value="{{$it->cost_price}}" >
                            </td>
                      @else
                            <td>
                            <input type="checkbox" class="check" data-id="{{$proveedor->id}}" name="check[{{$proveedor->id}}]">
                            </td>
                            <td>
                            {{$proveedor->name}}
                            </td>
                            <td>
                            $ <input type="text" name="cost_{{$proveedor->id}}" class="cost_{{$proveedor->id}}" disabled >
                            </td>

                      @endif
                                       
                      
                   @else

                    <td>
                    <input type="checkbox" class="check" data-id="{{$proveedor->id}}" name="check[{{$proveedor->id}}]">
                    </td>
                    <td>
                    {{$proveedor->name}}
                    </td>
                    <td>
                    $ <input type="text" name="cost_{{$proveedor->id}}" class="cost_{{$proveedor->id}}" disabled >
                    </td>

                    @endif
               </tr>
             @endforeach 

           </tbody>
         </table>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="collapseTwo">
          Categorias
          </a>
        </h4>
      </div>
      <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">    
           {{ Form::categories('categories') }}    
        </div>
      </div>
    </div>
      <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
            Especificaciones
          </a>
        </h4>
      </div>
      <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
              {{ Form::texto('total_weight','Peso total en Kg','0.01', '0') }}  
              {{ Form::texto('maximun_weight','Peso Maximo en Kg','0.01', '0') }}  
              {{ Form::texto('color','Color') }}
              {{ Form::texto('size','Tamaño') }}
              {{ Form::texto('stock','Stock','1', '0') }}
              {{ Form::um('um','Unidad de Medida')}}
        </div>
      </div>
    </div>
     <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="collapseThree">
            Imagenes
          </a>
        </h4>
      </div>
      <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
              {{ Form::imagen('image') }}
        </div>
      </div>
    </div>
  </div>

 <script type="text/javascript">
    
    $('.check').on('click',function(){
     
      var input = $(this).attr('data-id');
     
      if($('.cost_'+ input).attr('disabled'))
      {
           $('.cost_'+ input).removeAttr('disabled');
      }
      else
      {
        $('.cost_'+ input).val('');
        $('.cost_'+ input).attr('disabled', 'disabled');
      }

   });
    
    $('#form').on("keyup keypress", function(e) {
      var code = e.keyCode || e.which; 
        if (code  == 13) {               
          e.preventDefault();
          return false;
        }
    });
    
 </script>