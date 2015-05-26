  
  {{Form::texto('code', Lang::get("item.code"))}}
  {{Form::texto('name', Lang::get("item.name"))}}
  {{Form::texto('description', Lang::get("item.description"))}}
  {{Form::providers('provider_id', Lang::get("item.provider"))}}

  {{ Form::texto('cost_price',Lang::get("item.cost_price"),'0.01', '0') }}      
  {{ Form::texto('sell_price', Lang::get("item.sell_price"),'0.01', '0') }} 
  {{ Form::texto('rent_price_per_day',Lang::get("item.rent_price_per_day"),'0.01', '0') }} 

  <br/>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="collapseTwo">
          {{ Lang::get("item.categories") }}
          </a>
        </h4>
      </div>
      <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">    
           {{ Form::categories() }}    
        </div>
      </div>
    </div>
      <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
            {{ Lang::get("item.specifications") }}
          </a>
        </h4>
      </div>
      <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
              {{ Form::texto('total_weight',Lang::get("item.total_weight"),'0.01', '0') }}  
              {{ Form::texto('maximun_weight',Lang::get("item.maximun_weight"),'0.01', '0') }}  
              {{ Form::texto('color',Lang::get("item.color")) }}
              {{ Form::texto('size',Lang::get("item.size")) }}
              {{ Form::texto('stock',Lang::get("item.stock"),'1', '0') }}
              {{ Form::um('um',Lang::get("item.measure"))}}
        </div>
      </div>
    </div>
     <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="collapseThree">
            {{ Lang::get("item.images") }}
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
    
    $('#form').on("keyup keypress", function(e) {
      var code = e.keyCode || e.which; 
        if (code  == 13) {               
          e.preventDefault();
          return false;
        }
    });
    
 </script>