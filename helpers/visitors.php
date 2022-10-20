<?php
/* Add Visitor */
if (isset($_POST['Add_Visitor'])) {
    $visitor_names = mysqli_real_escape_string($mysqli, $_POST['visitor_names']);
    $visitor_id_number = mysqli_real_escape_string($mysqli, $_POST['visitor_id_number']);
    $visitor_email = mysqli_real_escape_string($mysqli, $_POST['visitor_email']);
    $visitor_phone_number = mysqli_real_escape_string($mysqli, $_POST['visitor_phone_number']);
    $visitor_check_in_date_time = date('d M Y', strtotime(mysqli_real_escape_string($mysqli, $_POST['visitor_check_in_date_time'])));
    $visitor_check_out_date_time = date('d M Y', strtotime(mysqli_real_escape_string($mysqli, $_POST['visitor_check_out_date_time'])));
    $visitor_where_visiting = mysqli_real_escape_string($mysqli, $_POST['visitor_where_visiting']);

    /* Persist */
    $sql = "INSERT INTO visitor(visitor_names, visitor_id_number, visitor_email, visitor_phone_number, visitor_check_in_date_time, visitor_check_out_date_time, visitor_where_visiting)
    VALUES('{$visitor_names}', '{$visitor_id_number}', '{$visitor_email}', '{$visitor_phone_number}', '{$visitor_check_in_date_time}', '{$visitor_check_out_date_time}', '{$visitor_where_visiting}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Visitor added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Visitor */
if (isset($_POST['Update_Visitor'])) {
    $visitor_id = mysqli_real_escape_string($mysqli, $_POST['visitor_id']);
    $visitor_id_number = mysqli_real_escape_string($mysqli, $_POST['visitor_id_number']);
    $visitor_email = mysqli_real_escape_string($mysqli, $_POST['visitor_email']);
    $visitor_phone_number = mysqli_real_escape_string($mysqli, $_POST['visitor_phone_number']);
    $visitor_check_in_date_time = date('d M Y', strtotime(mysqli_real_escape_string($mysqli, $_POST['visitor_check_in_date_time'])));
    $visitor_check_out_date_time = date('d M Y', strtotime(mysqli_real_escape_string($mysqli, $_POST['visitor_check_out_date_time'])));
    $visitor_where_visiting = mysqli_real_escape_string($mysqli, $_POST['visitor_where_visiting']);


    /* Persit */
    $sql = "UPDATE visitor SET
    visitor_names = '{$visitor_names}', 
    visitor_id_number =  '{$visitor_id_number}',
    visitor_email = '{$visitor_email}', 
    visitor_phone_number = '{$visitor_phone_number}',
    visitor_check_in_date_time =  '{$visitor_check_in_date_time}', 
    visitor_check_out_date_time =  '{$visitor_check_out_date_time}',
    visitor_where_visiting = '{$visitor_where_visiting}'
    WHERE visitor_id = '{$visitor_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Visitor updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Visitor */