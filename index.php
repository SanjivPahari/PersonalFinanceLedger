<!DOCTYPE html>

<?php
require_once('functions.php');


?>


<html>
<head>
	<title>Transactions</title>
	
	
	<?php
	require_once('style.php');
	?>
	
</head>
<body>



	<div class="container">
	
<?PHP require('header.php'); ?>

</div>


<div class="container">
	
<div id='test'>
	
		<h2>Transactions</h2>
		
		
		<div class="row">
   
   
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
    foreach ($transactions as $transaction) {
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
    

    
    echo "</div></div> </div> <div class='container extra'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6'>";
    echo "<h3>Completed Payments</h3>";
    display_transaction_list($completed_transactions, $name, $remark);
    echo "</div>";
    echo "<div class='col-md-6'>";
    echo "<h3>Pending Payments</h3>";
    display_transaction_list($pending_transactions, $name, $remark);
    show_net($total_receive, $total_give);
    echo "</div>";
    echo "</div>";
    echo "</div>";

?>
			
	</div>
	
	
		<script src="script.js"></script>
	<br><br><br>
</body>
</html>
