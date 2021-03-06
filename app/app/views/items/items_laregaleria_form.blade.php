  {{Form::texto('code','Codigo')}}
  {{Form::texto('name','Nombre')}}
  {{Form::texto('description','Descripcion')}}
  {{Form::providers('providers_id','Proveedor')}}

  {{ Form::texto('cost_price','Precio de compra','0.01', '0') }}      
  {{ Form::texto('sell_price','Precio de venta','0.01', '0') }} 
  
  <br/>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
              {{ Form::file('image') }}
        </div>
      </div>
    </div>
  </div>

   <script type="text/javascript">
    
    $('#form').on("keyup keypress", function(e) {
      var code = e.keyCode || e.which; 
        if (code  == 13) {               
          e.preventDefault();
          return false;
        }
    });
    
 </script>