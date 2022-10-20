<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');

/* Get Summarized Report */
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

/* Excel File Name */
$fileName = 'Admins Reports' . 'xls';

/* Excel Column Name */
$fields = array('Name ', 'Phone Number ', 'Email Address');


/* Implode Excel Data */
$excelData = implode("\t", array_values($fields)) . "\n";

/* Fetch All Records From The Database */
$query = $mysqli->query("SELECT * FROM administrator");
if ($query->num_rows > 0) {
    /* Load All Fetched Rows */
    while ($row = $query->fetch_assoc()) {

        $lineData = array(
            $row['admin_name'],
            $row['admin_phone_number'],
            $row['admin_email'],

        );
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No Administrator Records Available...' . "\n";
}

/* Generate Header File Encodings For Download */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

/* Render  Excel Data For Download */
echo $excelData;

exit;
