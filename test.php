<?php


function draw_calendar($month,$year){

	/* draw table */
	$days = array();

	/* days and weeks vars now ... */
	$running_day 		= date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month 		= date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week 	= 1;
	$day_counter 		= 0;
	$dates_array 		= array();



	/* print "blank" days until the first of the current week */
	
	for($x = 0; $x < $running_day; $x++):
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
	
		if($running_day == 6):
			
			if(($day_counter+1) != $days_in_month):
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;

		$days_in_this_week++; $running_day++; $day_counter++;

		array_push($days, $list_day);

	endfor;


	$dias = array('Do','Lu','Ma','Mi','Ju','Vi','Sa');

	foreach($days as $day)
	{
	  $dia[$day] =  $dias[date('w', mktime(0,0,0,$month,$day,$year))] ;
	}

return $dia ;
}

/* sample usages */


?>
<h1> Mayo 2015 </h1>
<table border="1">
	<tr>
		<td>Hotel Gato</td>
		<?php  foreach(draw_calendar(5,2015) as $day => $val)
		{
			echo "
				<td>".$day ."<br>".
			 $val."</td>";
		}
		?>
	</tr>
	<tr>
		<td>Hab. 1</td>
		<?php  foreach(draw_calendar(5,2015) as $day => $val)
		{
			echo "
				<td></td>";
		}
		?>
	</tr>


</table>


