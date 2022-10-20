<?php
/* Add Admin */
if (isset($_POST['Add_Admin'])) {
    $admin_name = mysqli_real_escape_string($mysqli, $_POST['admin_name']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    $admin_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['admin_password'])));

    /* Persist */
    $sql = "INSERT INTO administrator (admin_name, admin_phone_number, admin_email, admin_password)
    VALUES('{$admin_name}', '{$admin_phone_number}', '{$admin_email}', '{$admin_password}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Admin details added";
    } else {
        $err = "Failed, Please try again";
    }
}
/* Update Admin */
if (isset($_POST['Update_Admin'])) {
    $admin_id = mysqli_real_escape_string($mysqli, $_POST['admin_id']);
    $admin_name = mysqli_real_escape_string($mysqli, $_POST['admin_name']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);

    /* Persist */
    $sql = "UPDATE administrator SET admin_name = '{$admin_name}', admin_phone_number = '{$admin_phone_number}', admin_email = '{$admin_email}'
    WHERE admin_id = '{$admin_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Admin details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Admin */
if (isset($_POST['Delete_Admin'])) {
    $admin_id = mysqli_real_escape_string($mysqli, $_POST['admin_id']);

    /* Persist */
    $sql = "DELETE FROM administrator WHERE admin_id = '{$admin_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Admin details deleted";
    } else {
        $err = "Failed, try again";
    }
}
