<?php


require("nepali-date.php");


function generateDatalist($options, $name, $placeholder, $value, $icon) {
    // Create an array to store the number of repetitions for each option
    $repetitions = array_count_values($options);
    // Sort the options by the number of repetitions in descending order
    arsort($repetitions);
    $sorted_options = array_keys($repetitions);
	
	if($name=='amount') {
		$type='number';
	} else {
		$type='text';
	}
    
    echo '<label for="'.$name.'"><i class="fa fa-'.$icon.'"></i>  '.ucfirst($name).':</label>';
    echo '<input type="'.$type.'" class="form-control"  placeholder="Enter '.ucfirst($name).'" id="'.$name.'" name="'.$name.'" list="'.$name.'-options" value="'.(isset($_POST[$name]) ? $_POST[$name] : '').'" >';
    echo '<datalist id="'.$name.'-options">';
    echo '<option value="">'.$placeholder.'</option>';
    foreach ($sorted_options as $option) {
        // Display the option with the number of repetitions in parentheses
        echo '<option value="'.$option.'"'.($value == $option ? ' selected' : '').'> Transactions: '.$repetitions[$option].'</option>';
    }
    echo '</datalist>';
    echo '<br>';
}



function generateDatalist_acc_num($options, $name, $placeholder) {
    // Create an array to store the number of repetitions for each option
    $repetitions = array_count_values($options);
    // Sort the options by the number of repetitions in descending order
    arsort($repetitions);
    $sorted_options = array_keys($repetitions);
	

  
    echo '<input type="text" class="form-control"  placeholder="Enter details..." id="'.$name.'" name="'.$name.'" list="'.$name.'-options" value="'.(isset($_POST[$name]) ? $_POST[$name] : '').'" >';
    echo '<datalist id="'.$name.'-options">';
    echo '<option value="">'.$placeholder.'</option>';
    foreach ($sorted_options as $option) {
        // Display the option with the number of repetitions in parentheses
        echo '<option value="'.$option.'"'.($value == $option ? ' selected' : '').'> Transactions: '.$repetitions[$option].'</option>';
    }
    echo '</datalist>';
    echo '<br>';
}


date_default_timezone_set("Asia/Kathmandu");

$transactions = get_transactions();

$archived_transactions = get_transactions_archived();


$pending_transactions = get_pending_transactions();
$completed_transactions = get_completed_transactions();


function cmp($a, $b) {
		return ($b['date']) - ($a['date']);
	}


function get_transactions() {
    $data_file = "data.json";
    $archives_file = "archives.json";

    $transactions = array();

    // Get transactions from data file
    if (file_exists($data_file)) {
        $data = file_get_contents($data_file);
        $transactions = json_decode($data, true);
    }

    // Get archived transaction IDs
    $archived_ids = array();
    if (file_exists($archives_file)) {
        $archives_data = file_get_contents($archives_file);
        $archives = json_decode($archives_data, true);
        foreach ($archives as $archive) {
            $archived_ids[] = $archive['transaction_id'];
        }
    }

    // Filter out archived transactions
    $unarchived_transactions = array();
    foreach ($transactions as $transaction) {
        if (!in_array($transaction['date'], $archived_ids)) {
            $unarchived_transactions[] = $transaction;
        }
    }

    return $unarchived_transactions;
}


function get_transactions_archived() {
    $data_file = "data.json";
    $archives_file = "archives.json";

    $archived_transactions = array();

    // Get archived transaction IDs from archives file
    $archived_ids = array();
    if (file_exists($archives_file)) {
        $data = file_get_contents($archives_file);
        $archives = json_decode($data, true);
        foreach ($archives as $archive) {
            $archived_ids[] = $archive['transaction_id'];
        }
    }

    // Get data for archived transactions from data file
    if (file_exists($data_file)) {
        $data = file_get_contents($data_file);
        $transactions = json_decode($data, true);
        foreach ($transactions as $transaction) {
            if (in_array($transaction['date'], $archived_ids)) {
                $transaction['date_archived'] = get_archived_date($transaction['date'], $archives);
                $archived_transactions[] = $transaction;
            }
        }
    }

    // Sort the archived transactions by date_archived
    usort($archived_transactions, function($a, $b) {
        if ($a['date_archived'] < $b['date_archived']) {
            return -1;
        } else if ($a['date_archived'] > $b['date_archived']) {
            return 1;
        } else {
            return 0;
        }
    });

    return $archived_transactions;
}

function get_archived_date($transaction_id, $archives) {
    foreach ($archives as $archive) {
        if ($archive['transaction_id'] == $transaction_id) {
            return $archive['date_archived'];
        }
    }
    return null;
}




function add_transaction($amount, $type, $name, $direction, $remark, $payment_mode, $acc_num) {
	$transaction = array(
		"amount" => $amount,
		"type" => $type,
		"name" => $name,
		"direction" => $direction,
		"remark" => $remark,
		"pmode" => $payment_mode,
		"acc_num" => $acc_num,
		"date" => time()
	);

	$file = "data.json";
	if (file_exists($file)) {
		$data = file_get_contents($file);
		$transactions = json_decode($data, true);
	} else {
		$transactions = array();
	}

	array_push($transactions, $transaction);
	$data = json_encode($transactions);
	file_put_contents($file, $data);
}

function get_pending_transactions() {
	$transactions = get_transactions();
	$pending_transactions = array();
	foreach ($transactions as $transaction) {
		if ($transaction["type"] == "pending") {
			array_push($pending_transactions, $transaction);
		}
	}
	return $pending_transactions;
}

function get_completed_transactions() {
	$transactions = get_transactions();
	$completed_transactions = array();
	foreach ($transactions as $transaction) {
		if ($transaction["type"] == "completed") {
			array_push($completed_transactions, $transaction);
		}
	}
	return $completed_transactions;
}


function display_theaders() {
    $headers = array(
	   'Time' => 'clock',
        'Date' => 'calendar-alt',
        'Name' => 'user',
        'Direction' => 'exchange-alt',
        'Amount' => 'money-bill',
        'Remark' => 'sticky-note',
        'Payment Mode' => 'credit-card'
    );
    return $headers;
}

    function display_transaction_list($transactions, $name, $remark) {
        echo "<table class='table'>";
        echo "<thead>";
        display_table_header(display_theaders());
        echo "</thead>";
        echo "<tbody>";
        foreach ($transactions as $transaction) {
            display_transaction($transaction, $total_receive, $total_give);
        }
		
	
		
        echo "</tbody>";
        echo "</table>";
    }
	
	
	
function display_table_header($headers) {
    echo "<tr>";
    foreach ($headers as $header => $icon) {
        echo "<th><i class='fas fa-$icon'></i> $header</th>";
    }
    echo "<th>Cumulative</th>";
    echo "</tr>";
}

    
    function display_transaction($transaction, &$total_receive, &$total_give) {
        if (stripos($transaction['name'], $_POST['name']) === false
            || stripos($transaction['remark'], $_POST['remark']) === false) {
            return;
        }
        $amount = $transaction['amount'];
        if ($transaction["direction"] == "give") {
            $total_give += $transaction["type"] == "pending" ? $amount : -$amount;
        } else if ($transaction["direction"] == "receive") {
            $total_receive += $transaction["type"] == "pending" ? $amount : -$amount;
        }
       
        display_params($transaction);
        echo "<td>" . show_cumulative($total_receive, $total_give) . "</td>";
		
		
		echo '<td> <button id="archive-btn" onclick="Archive('.$transaction['date'].')" class="btn btn-warning btn-sm archiveBtn" > <i class="fas fa-archive"></i></button> </td>';
		
	     echo '<td> <button id="repeat-btn" onclick="RepeatPayment('.$transaction['date'].')" class="btn btn-primary btn-sm " > <i class="fas fa-paper-plane"></i></button> </td>';

		
		// Read the archives.json file
$archives = json_decode(file_get_contents('archives.json'), true);

// Check if $transaction['date'] exists as a 'transaction_id' in the archives
foreach ($archives as $archive) {
	
  if ($archive['transaction_id'] == $transaction['date']) {
    echo '<td> <b> Archived: ' . date('g:i A, l, jS F Y', $archive['date_archived']).' </b> </td>';
  
  }
}

        echo "</tr>";
    }
	
	


 function display_params($transaction) {
	 
	  if (stripos($transaction['remark'], 'all clear') !== false) {
		 $confirm_clear='clear';
	 } else {
		 $confirm_clear='';
	 }
	
										echo '<tr class="trans_data '.$transaction['type'].' '.$transaction['direction'].' '.$confirm_clear.'" data-date="'.$transaction['date'].'"  >';
									
									
	
	$nepali_date = new nepali_date();

$year_en = date("Y",$transaction['date']);
$month_en = date("m",$transaction['date']);
$day_en = date("d",$transaction['date']);
$date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);


					  	echo '<td> ' . date('g:i A', $transaction['date']) . '</td>';
	
	
	echo '<td><b> '.$date_ne['d'].' '.$date_ne['M'].' '.$date_ne['y'].' </b> <hr>  <small class="text-muted">' . date('l, jS F Y', $transaction['date']) . ' </span> </td>';
	
	
									echo '<td class="name_in_table">' . $transaction['name'] . '</td>';
									
									
									
									$direction = $transaction['direction'];
$type = $transaction['type'];

// Initialize the output variable
$output = '';

if ($direction == 'give' && $type == 'completed') {
    $output = "I have given";
} else if ($direction == 'give' && $type == 'pending') {
    $output = "I have to give";
} else if ($direction == 'receive' && $type == 'pending') {
    $output = "I have to receive";
} else if ($direction == 'receive' && $type == 'completed') {
    $output = "I have received";
} else {
    $output = "Invalid transaction";
}

									
									echo '<td>' . $output . '</td>';
									
									
									
										echo '<td>Rs. ' . $transaction['amount'] . '</td>';
										echo '<td> ' . $transaction['remark'] . '</td>';
										
										if(isset($transaction['pmode'])) {
											
											if($transaction['pmode']=='') 
											{
												$pmode='cash';
											} else {
												$pmode=$transaction['pmode'];
											}
											echo '<td><img src="icons/' . $pmode . '-icon.png" alt="' . $pmode . ' Icon" width="40" height="20" class="mr-2"> : ' . $transaction['acc_num'] . '</td>';
										} else {
											echo '<td> </td>';
										}
									//	echo '<td class="cumulative"> c </td>';
}

	function show_net($total_receive,$total_give) {
					
					$net_amount = $total_receive - $total_give;

echo '<span class="receive"> Total amount to receive: Rs ' . $total_receive . "</span><br>";
echo '<span class="give"> Total amount to give: Rs ' . $total_give . "</span>";


if ($net_amount > 0) {
  
  echo '<div class="receive text-right"> I have to receive Rs ' . $net_amount . "</div><br>";
  
  
} elseif ($net_amount < 0) {
   
    echo '<div class="give text-right"> I have to give Rs ' . abs($net_amount). "</div><br>";
	
} else {
       echo '<div class=" text-right">Net Amount: 0 </div><br>';
}

	}
	
	
		function show_cumulative($total_receive,$total_give) {
					
					$net_amount = $total_receive - $total_give;




if ($net_amount > 0) {
  
  return '<span class="receive "> I have to receive Rs ' . $net_amount . "</span><br>";
  
  
} elseif ($net_amount < 0) {
   
    return '<span class="give "> I have to give Rs ' . abs($net_amount). "</span><br>";
	
} else {
       return '<span class="">Net Amount: 0 </span><br>';
}

	}
	
?>
