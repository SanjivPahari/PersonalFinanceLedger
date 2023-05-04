<?php
// Define the file path
$file = 'data.json';

// Set the download headers
header('Content-Type: application/json');

header('Content-Disposition: attachment; filename="sanjiv-transactions-' . date('Y_F_d_g_i_a') . '.json"');


readfile($file);
exit();
?>