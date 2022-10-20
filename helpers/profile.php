<?php
/* Update Admin */
if (isset($_POST['Update_My_Account'])) {
    $admin_id = mysqli_real_escape_string($mysqli, $_POST['admin_id']);
    $admin_name = mysqli_real_escape_string($mysqli, $_POST['admin_name']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);

    /* Persist */
    $sql = "UPDATE administrator SET admin_name = '{$admin_name}', admin_phone_number = '{$admin_phone_number}', admin_email = '{$admin_email}'
     WHERE admin_id = '{$admin_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Personal details updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* Change Password  */
if (isset($_POST['Updaate_Passwords'])) {
    $admin_id = mysqli_real_escape_string($mysqli, $_POST['admin_id']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Persist */
    if ($confirm_password != $new_password) {
        $err = "Failed, passwords does not match";
    } else {
        /* Update */
        $sql = "UPDATE administrator SET admin_password = '{$confirm_password}' WHERE admin_id = '{$admin_id}'";
        if (mysqli_query($mysqli, $sql)) {
            $success = "Password  updated";
        } else {
            $err = "Failed, please try again";
        }
    }
}
