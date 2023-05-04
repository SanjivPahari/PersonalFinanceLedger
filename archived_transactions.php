<!DOCTYPE html>

<?php
require_once('functions.php');


?>


<html>
<head>
	<title>Archived Transactions</title>
	
	
	<?php
	require_once('style.php');
	?>
	
</head>
<body>
	<div class="container">
	
	<?PHP require('header.php'); ?>

				
		<h2> Archived Transactions</h2>
		
		
		<div class="row">
		
		
		
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



  
    <div class="col-md-6 offset-md-6 mt-5">
      <input type="text" id="search-box" class="form-control" placeholder="Search...">
    </div>
  </div>
  
  
		<div class="row">
		
			
<?php

     $_POST['name'] = '';
     $_POST['remark'] = '';
	 $name='';
	 $remark='';
    $total_amount = 0;
    $num_transactions = 0;
    
   
    
   
    
    echo '<table class="table">';
    echo '<thead>';
    display_table_header(display_theaders());

    echo '</thead>';
    echo '<tbody>';
    $total_give = $total_receive = 0;
    foreach ($archived_transactions as $transaction) {
        display_transaction($transaction, $total_receive, $total_give);
        $total_amount += $transaction['amount'];
        $num_transactions++;
    }
    echo '</tbody>';
    echo '</table>';
    if ($num_transactions > 0) {
        echo "<p>Total amount: Rs. $total_amount</p>";
    } else {
        echo "<p>No transactions found for $name</p>";
    }
    

    
    echo "</div></div>";

?>
			
	
	
	<!-- Example tooltip element to display archive date -->


<!-- JavaScript function to create tooltip -->

	
		<script src="script.js"></script>
	<br><br><br>
</body>
</html>
