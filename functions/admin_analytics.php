<?php
/* Todays Date */
$start_today = date('d M Y');

/* Administrators With Access */
$query = "SELECT COUNT(*)  FROM administrator ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($administrator);
$stmt->fetch();
$stmt->close();

/* Total Number Of Visitors */
$query = "SELECT COUNT(*)  FROM visitor WHERE visitor_check_in_date_time = '{$start_today}' AND visitor_check_out_date_time = '{$start_today}' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitors_visited_today);
$stmt->fetch();
$stmt->close();


/* Visitors */
$query = "SELECT COUNT(*)  FROM visitor ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitors);
$stmt->fetch();
$stmt->close();
