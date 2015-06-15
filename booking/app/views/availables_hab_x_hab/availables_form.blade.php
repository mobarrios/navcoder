  {{Form::types('types_id','Tipos de Habitaciones')}}

  {{Form::texto('quantity','Cantidad')}}
  
  {{Form::date('from','Desde')}}
  
  {{Form::date('to','Hasta')}}

  {{Form::currency('currency','Moneda')}}
  
  {{Form::texto('price','$ Importe')}}



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