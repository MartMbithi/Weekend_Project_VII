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
$fileName = 'Visitor Reports' . 'xls';

/* Excel Column Name */
$fields = array('Full Names ', 'ID Number ', 'Phone Number', 'Email', 'Check In', 'Check Out', 'Place Visited');


/* Implode Excel Data */
$excelData = implode("\t", array_values($fields)) . "\n";

/* Fetch All Records From The Database */
$query = $mysqli->query("SELECT * FROM visitor");
if ($query->num_rows > 0) {
    /* Load All Fetched Rows */
    while ($row = $query->fetch_assoc()) {

        $lineData = array(
            $row['visitor_names'],
            $row['visitor_id_number'],
            $row['visitor_phone_number'],
            $row['visitor_email'],
            $row['visitor_check_in_date_time'],
            $row['visitor_check_out_date_time'],
        );
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No Visitor Records Available...' . "\n";
}

/* Generate Header File Encodings For Download */
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

/* Render  Excel Data For Download */
echo $excelData;

exit;
