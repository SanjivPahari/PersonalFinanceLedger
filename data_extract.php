<?php
// Get the posted date from the GET data
if (isset($_POST['date']) && !empty($_POST['date'])) {
  $date_requested = intval($_POST['date']);
} else {
  die("Date not provided.");
}

// Read the data from the JSON file
$json_data = file_get_contents('data.json');

// Decode the JSON data into a PHP array
$transactions = json_decode($json_data, true);

// Filter transactions for the requested date
$filtered_transactions = array_filter($transactions, function ($transaction) use ($date_requested) {
  return isset($transaction['date']) && intval($transaction['date']) === $date_requested;
});

// If there are transactions for the requested date, echo them
if (!empty($filtered_transactions)) {
  // Re-index the array with sequential integer keys
  $filtered_transactions = array_values($filtered_transactions);
  echo json_encode($filtered_transactions, JSON_PRETTY_PRINT);
} else {
  echo "No transactions found for the requested date.";
}
