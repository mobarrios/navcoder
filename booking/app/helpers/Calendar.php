<?php

class Calendar
{

	public static function days_array($startTime = null, $endTime = null)
	{
	    $day 		= 86400;
	    $format 	= 'Y-m-d';
	    $startTime 	= strtotime($startTime);
	    $endTime 	= strtotime($endTime);
	    //$numDays 	= round(($endTime - $startTime) / $day) + 1;
	    $numDays 	= round(($endTime - $startTime) / $day); // remove increment 

	    $days 		= array();

		    for ($i = 0; $i <= $numDays; $i++) 
		    { //change $i to 1
		    	$days[] = date($format, ($startTime + ($i * $day)));
		    }

	    return $days;
	}

	public static function draw_calendar($month,$year){

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




		foreach($days as $day)
		{
		  $dia[$day] = date('w', mktime(0,0,0,$month,$day,$year)) ;
		}

	return $dia ;
	}

}
