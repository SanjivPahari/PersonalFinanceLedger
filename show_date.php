<?PHP
		$nepali_date = new nepali_date();
$year_en = date("Y",time());
$month_en = date("m",time());
$day_en = date("d",time());
$date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);


$date_en = $nepali_date->get_eng_date($date_ne['y'],$date_ne['m'],$date_ne['d'] );

			
echo '<div class="text-right"> <h4 class="text-muted">';
echo date('g:i A',time()).'<br>';
echo '' . $date_en['d'] . ' ' . $date_en['M'] . ', ' . $date_en['l'] . ' ' . $date_en['y'] . ' AD <hr>';
echo '</div> <div class="text-left">' . $date_ne['d'] . ' ' . $date_ne['M'] . ', ' . $date_ne['l'] . ' ' . $date_ne['y'] . ' B.S </br>';
echo '</h4> </div><br>';

?>