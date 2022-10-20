<?php

/* Login */
if (isset($_POST['Login'])) {
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    $admin_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['admin_password'])));

    /* Process Login */
    $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id FROM administrator 
    WHERE admin_email = '{$admin_email}' AND admin_password = '{$admin_password}'");
    $stmt->execute();
    $stmt->bind_result($admin_email, $admin_password, $admin_id);
    $rs = $stmt->fetch();

    /* Session Variables */
    $_SESSION['admin_id'] = $admin_id;

    if ($rs) {
        /* Pass This Alert Via Session */
        $_SESSION['success'] = 'Login successful';
        header('Location: dashboard');
        exit;
    } else {
        $err = "Incorrect email or password";
    }
}



/* Reset Password Step 1 */
if (isset($_POST['Reset_Password_Step_1'])) {
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    /* Check If User Exists */
    $sql = "SELECT * FROM  administrator WHERE admin_email = '{$admin_email}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect User To Confirm Password */
        $_SESSION['success'] = 'Password Reset Token Generated, Proceed To Confirm Password';
        $_SESSION['admin_email'] = $admin_email;
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Email does not exist";
    }
}

/* Reset Password Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $admin_email = mysqli_real_escape_string($mysqli, $_SESSION['admin_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If They Match */
    if ($new_password != $confirm_password) {
        $err = "Passwords Does Not Match";
    } else {
        $sql = "UPDATE administrator SET admin_password = '{$confirm_password}' WHERE admin_email = '{$admin_email}'";

        if (mysqli_query($mysqli, $sql)) {
            /* Pass This Alert Via Session */
            $_SESSION['success'] = 'Your password has been reset proceed to login';
            header('Location: ../');
            exit;
        } else {
            $err = "Failed!, please try again";
        }
    }
}
