<?php

/* Login */
if (isset($_POST['Login'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $login_password = md5(mysqli_real_escape_string($mysqli, $_POST['login_password']));

    /* Process Login */
    $stmt = $mysqli->prepare("SELECT login_username, login_password, login_rank, login_id FROM login 
    WHERE login_username = '{$login_username}' AND login_password = '{$login_password}'");
    $stmt->execute();
    $stmt->bind_result($login_username, $login_password, $login_rank, $login_id);
    $rs = $stmt->fetch();

    /* Session Variables */
    $_SESSION['login_id'] = $login_id;
    $_SESSION['login_rank'] = $login_rank;

    if (($rs && $login_rank == "administrator")) {
        /* Pass This Alert Via Session */
        $_SESSION['success'] = 'You Have Successfully Logged In';
        header('Location: dashboard');
        exit;
    } elseif ($rs && $user_access_level == "owner") {
        $_SESSION['success'] = 'Successfully logged in as pet owner';
        header('Location: owner_dashboard');
        exit;
    } elseif ($rs && $user_access_level == "adopter") {
        $_SESSION['success'] = 'Successfully logged in as pet adopter';
        header('Location: adopter_dashboard');
        exit;
    } else {
        $err = "Access Denied Please Check Your Email Or Password";
    }
}



/* Reset Password Step 1 */
if (isset($_POST['Reset_Password_Step_1'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    /* Check If User Exists */
    $sql = "SELECT * FROM  login WHERE login_username = '{$login_username}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect User To Confirm Password */
        $_SESSION['success'] = 'Password Reset Token Generated, Proceed To Confirm Password';
        $_SESSION['login_username'] = $login_username;
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Email Does Not Exist";
    }
}

/* Reset Password Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_SESSION['login_username']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If They Match */
    if ($new_password != $confirm_password) {
        $err = "Passwords Does Not Match";
    } else {
        $sql = "UPDATE login SET login_password = '{$confirm_password}' WHERE login_username = '{$login_username}'";

        if (mysqli_query($mysqli, $sql)) {
            /* Pass This Alert Via Session */
            $_SESSION['success'] = 'Your Password Has Been Reset Proceed To Login';
            header('Location: login');
            exit;
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}
