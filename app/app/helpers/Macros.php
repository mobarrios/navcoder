<?php
    
    Form::macro('providers', function($name, $label)
        {
            $prov = Providers::lists('name','id');
            $input = Form::select($name , array('Ninguno') + $prov ,null, array('class'=>'form-control')); 

            return buildInput($input,$label);  
        });

 	Form::macro('date', function($name)
        {
            $value = Form::getValueAttribute($name);

            return '<input type="text" class="datepicker form-control " name="'.$name.'" placeholder="mm/dd/yyyy" value="'.$value.'">';
        });

    Form::macro('areas', function($name)
        {
            $areas = Area::lists('area','id');
            return Form::select($name,$areas,array('class'=>'form-control')); 
        });

    Form::macro('edit', function($name)
        {
            $value = Form::getValueAttribute($name);
            return '<div class="form-control">
                        <textarea  name="'.$name.'" >'.$value.'</textarea>
                    </div>';
        });

    Form::macro('texto', function($name, $label)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input class="form-control" name="'.$name.'" value='.$value.'>';
    
            return buildInput($input,$label);         
          	
        });

    Form::macro('pass', function($name, $label)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input type="password" class="form-control" name="'.$name.'" value='.$value.'>';
    
            return buildInput($input,$label);         
            
        });

    Form::macro('number', function($name, $label, $step, $minimum)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input type="number" class="form-control" name="'.$name.'" value='.$value.' step="'.$step.'" min="'.$minimum.'">';
    
            return buildInput($input,$label);         
            
        });

    Form::macro('categories', function($name)
    {
        
        // Retrieves the id from the model when it comes from the edit side
        $id = Form::getValueAttribute('id');
                
        $var        = '  <div style="max-height: 200px;  overflow-y: scroll;" >
            
                    <ul class="list-group">';
        
        foreach(Categories::orderBy('name','ASC')->get() as $category)
        {

            if($itemscategories = ItemsCategories::where('items_id','=',$id)->where('categories_id','=',$category->id)->first())
            {
               $checked = "checked";
            }else{
               $checked = "";
            }
            
            $var .= '<li class="list-group-item">
                        <input type="checkbox" name="chk_category[]"  
                            value="'.$category->id.'" 
                            '.$checked.'
                        >  '.$category->name.'</li>'; 
        } 
                                        
            
        $var .= '</ul></div>';

        return $var;        
    });


//armamos el div con el label y el input

function buildInput($input, $label)
{
	$input = '		<div class="row">
					<div class="col-xs-12">
						<label class="control-label">'.$label.'</label>
					</div>
					<div class="col-xs-12">
						'.$input.'
					</div>
					</div>';

	return $input;
}
?>