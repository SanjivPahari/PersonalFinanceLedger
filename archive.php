<?php

date_default_timezone_set("Asia/Kathmandu");

// Check if the archives.json file exists, if not create it
if (!file_exists('archives.json')) {
  file_put_contents('archives.json', json_encode([]));
}

// Get the posted date from the POST data
if (isset($_POST['date']) && !empty($_POST['date'])) {
  $transaction_id = $_POST['date'];
} else {
 die();
}

// Read the archives.json file
$archives = json_decode(file_get_contents('archives.json'), true);

// Check if the transaction ID already exists in the archives
foreach ($archives as $key => $archive) {
  if ($archive['transaction_id'] === $transaction_id) {
    // Remove the archived date entry to unarchive the date
    unset($archives[$key]);
	
	$action='ok';
  }
}



if($action!='ok') {
	// Get the current date
$date_archived = time();

// Add the transaction ID and date archived to the archives
$archives[] = array(
  'transaction_id' => $transaction_id,
  'date_archived' => $date_archived
);
}



// Save the archives to the archives.json file
file_put_contents('archives.json', json_encode($archives));
