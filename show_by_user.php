<!DOCTYPE html>

<?php
require_once('functions.php');



?>



<html>
<head>
	<title>Show Transactions By User</title>
	
	<?php
require_once('style.php');



?>



</head>
<body>
	<div class="container">

<?PHP require('header.php'); ?>




<div class="container mt-5">
  <div class="card bg-light">
    <div class="card-header">
      <h3 class="card-title text-center">Transactions by User</h3>
    </div>
    <div class="card-body">
      <form method="post" action="">
        <div class="form-group row">
          <div class="col-sm-6">
            <?php generateDatalist((array_column($transactions, 'name')), 'name', 'Select Name', isset($_POST['name']) ? $_POST['name'] : '','user'); ?>
          </div>
          <div class="col-sm-6">
            <?php generateDatalist((array_column($transactions, 'remark')), 'remark', 'Select Remark', isset($_POST['remark']) ? $_POST['remark'] : '','sticky-note'); ?>
          </div>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary btn-lg btn-block">
            Submit <i class="fa fa-paper-plane"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<br><br>
		
		
		<form method="POST" action="form.php">
		<div class="text-right">


    <input type="text" name="name" hidden value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['name']); } ?>">
    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i>  Add Transaction</button>
	
</div>

</form>

		<div class="row">
   
   
    <div class="col-md-6 offset-md-6 mt-5">
      <input type="text" id="search-box" class="form-control" placeholder="Search...">
    </div>
  </div>
  

		
		<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $total_amount = 0;
    $num_transactions = 0;
    
    echo "<h3>Transactions for: $name - $remark</h3>";
    
   
    
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
    

    
    echo "</div> <div class='container extra'>";
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
}
?>


	
	
		<script src="script.js"></script>
</body>
</html>
