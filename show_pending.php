<!DOCTYPE html>
<html>

<?php
require_once('functions.php');



?>


<head>
	<title>Pending Settlements</title>

	
		
	<?php
require_once('style.php');



?>



</head>
<body>
	<div class="container">

<?PHP require('header.php'); ?>

	
	</div> 
	
	<div id='print-content'>
	
	<div  class="container">

		<h2>Pending Settlements</h2>
		
		<?PHP
		require('show_date.php');
?>



		<table class="table">
			<thead>
				<tr>
				<th>SN</th>
					<th>Name</th>
					<th>Net Amount</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$net_amounts = array();
			$total_give = array();
			$total_receive = array();

		// Loop through all the transactions
		foreach ($transactions as $transaction) {
			$name = $transaction['name'];
			$amount = $transaction['amount'];

			// Add the amount to the net amount for the user
			if (!isset($net_amounts[$name])) {
				$net_amounts[$name] = 0;
				$total_give[$name] = 0;
				$total_receive[$name] = 0;
			}
			
			  if ($transaction["direction"] == "give") {
								  
								  if ($transaction["type"] == "pending") { 
        $total_give[$name] += $transaction["amount"];
								  } else {
									     $total_give[$name] -= $transaction["amount"];
									  
								  }
		
    } elseif ($transaction["direction"] == "receive") {
		
		
         if ($transaction["type"] == "pending") { 
        $total_receive[$name] += $transaction["amount"];
								  } else {
									     $total_receive[$name] -= $transaction["amount"];
									  
								  }
		
		
    }
	
	$net_amounts[$name] = $total_receive[$name] - $total_give[$name];
	
		}
		
	uasort($net_amounts, function($a, $b) {
    return abs($a) <=> abs($b);
});

$total_positive=0;

$total_negative=0;


$i=1;

		// Loop through all the users and display their net amount
		foreach ($net_amounts as $name => $net_amount) {
			if ($net_amount == 0) {
				continue; // Skip users with a net amount of zero
			}
			
			if ($net_amount>0) {
				$total_positive=$total_positive+$net_amount;
			}
			
			
			if ($net_amount<0) {
				$total_negative=$total_negative+abs($net_amount);
			}
			
			
			echo '<tr>';
			
				echo '<td>' . $i . '</td>';
$i++;


			echo '<td class="name_in_table">' . $name . '</td>';
			echo '<td>' . show_cumulative($total_receive[$name], $total_give[$name]) . '</td>';
			
					   echo '<td><button onclick="ClearPayment('.$total_receive[$name].','.$total_give[$name].')" class="btn btn-info" > <i class="fas fa-paper-plane"></i> Clear </button> </td>';


			echo '</tr>';
		}
		?>
		</tbody>
	</table>
	
	
	<?PHP
	 echo "</div> <div class='container extra2'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6'>";
    echo "<h3>To Receive: <span class='receive '>  Rs. $total_positive  </span> </h3>";
	
	?>
			<table class="table">
			<thead>
				<tr>
					<th>SN</th>
					<th>Name</th>
					<th>Net Amount</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$i=1;

		// Loop through all the users and display their net amount
		foreach ($net_amounts as $name => $net_amount) {
			if ($net_amount > 0) {
				
			echo '<tr>';
						echo '<td>' . $i . '</td>';
$i++;
			echo '<td class="name_in_table">' . $name . '</td>';
			echo '<td>' . show_cumulative($total_receive[$name], $total_give[$name]) . '</td>';
			
		   echo '<td><button onclick="ClearPayment("'.$name.'",'.$total_receive[$name].','.$total_give[$name].')" class="btn btn-info" > <i class="fas fa-paper-plane"></i> Clear </button> </td>';
				
				
			echo '</tr>';
			
			
			}
		}
		?>
		</tbody>
	</table>
	
	
	</div>
	
	
	<?PHP

    echo "<div class='col-md-6'>";
    echo "<h3>To Give: <span class='give '>  Rs. $total_negative  </span> </h3>";
	
	?>
			<table class="table">
			<thead>
				<tr>
				<th>SN</th>
					<th>Name</th>
					<th>Net Amount</th>
				</tr>
			</thead>
			<tbody>
			<?php

$i=1;

		// Loop through all the users and display their net amount
		foreach ($net_amounts as $name => $net_amount) {
			if ($net_amount < 0) {
				
			echo '<tr>';
			
			
				echo '<td>' . $i . '</td>';
$i++;


			echo '<td class="name_in_table">' . $name . '</td>';
			echo '<td>' . show_cumulative($total_receive[$name], $total_give[$name]) . '</td>';
					   echo '<td><button onclick="ClearPayment("'.$name.'",'.$total_receive[$name].','.$total_give[$name].')" class="btn btn-info" > <i class="fas fa-paper-plane"></i> Clear </button> </td>';

			echo '</tr>';
			
			
			}
		}
		?>
		</tbody>
	</table>
	
	
	 <?PHP  echo "<h3>NET: ".show_cumulative($total_positive, $total_negative)."</h3>" ?>
	 
	</div>
	
	
	
	   </div>
	   
	</div></div> 
	
	
</div>

	<script src="script.js"></script>
</body>
</html>