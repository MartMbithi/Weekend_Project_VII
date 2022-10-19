<?php
/*
 *   Crafted On Wed Sep 28 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */


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

/* Sign Up As Pet Adopter */
if (isset($_POST['Register_Pet_Adopter'])) {
    $pet_adopter_name = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_name']);
    $pet_adopter_email = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_email']);
    $pet_adopter_phone_number = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_phone_number']);
    $pet_adopter_address = mysqli_real_escape_string($mysqli, $_POST['pet_adopter_address']);

    /* Auth Variables */
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $login_password = md5(mysqli_real_escape_string($mysqli, $_POST['login_password']));
    $login_rank = mysqli_real_escape_string($mysqli, 'Adopter');

    /* Prevent Double submissions */
    $sql = "SELECT * FROM  login   WHERE login_username = '{$login_username}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (
            $login_username == $row['login_username']
        ) {
            $err = 'Login username already taken';
        }
    } else {
        /* Persist Auth Record */
        $auth_sql = "INSERT INTO login (login_username, login_password, login_rank) VALUES('{$login_username}', '{$login_password}', '{$login_rank}')";
        if (mysqli_query($mysqli, $auth_sql)) {
            /* Get Newly Inserted Login Id */
            $login_id = $mysqli->insert_id;

            /* Persist Adopter Record */
            $adopter_sql = "INSERT INTO pet_adopter(pet_adopter_login_id, pet_adopter_name, pet_adopter_email, pet_adopter_phone_number, pet_adopter_address)
            VALUES('{$login_id}', '{$pet_adopter_name}', '{$pet_adopter_email}', '{$pet_adopter_phone_number}', '{$pet_adopter_address}')";

            if (mysqli_query($mysqli, $adopter_sql)) {
                /* Redirect To Login After Successful Sign Up */
                $_SESSION['success'] = 'Account created successfully';
                header('Location: ../');
                exit;
            }
        } else {
            $err = "Failed saving login information, please try again";
        }
    }
}

/* Sign Up As Pet Owner */
if (isset($_POST['Register_Pet_Owner'])) {
    $pet_owner_name = mysqli_real_escape_string($mysqli, $_POST['pet_owner_name']);
    $pet_owner_email = mysqli_real_escape_string($mysqli, $_POST['pet_owner_email']);
    $pet_owner_contacts = mysqli_real_escape_string($mysqli, $_POST['pet_owner_contacts']);
    $pet_owner_address = mysqli_real_escape_string($mysqli, $_POST['pet_owner_address']);

    /* Auth Variables */
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $login_password = md5(mysqli_real_escape_string($mysqli, $_POST['login_password']));
    $login_rank = mysqli_real_escape_string($mysqli, 'Owner');

    /* Prevent Double submissions */
    $sql = "SELECT * FROM  login   WHERE login_username = '{$login_username}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (
            $login_username == $row['login_username']
        ) {
            $err = 'Login username already taken';
        }
    } else {
        /* Persist Auth Record */
        $auth_sql = "INSERT INTO login (login_username, login_password, login_rank) VALUES('{$login_username}', '{$login_password}', '{$login_rank}')";
        if (mysqli_query($mysqli, $auth_sql)) {
            /* Get Newly Inserted Login Id */
            $login_id = $mysqli->insert_id;

            /* Persist Owner Record */
            $owner_sql = "INSERT INTO pet_owner(pet_owner_login_id, pet_owner_name, pet_owner_email, pet_owner_contacts, pet_owner_address)
            VALUES('{$login_id}', '{$pet_owner_name}', '{$pet_owner_email}', '{$pet_owner_contacts}', '{$pet_owner_address}')";

            if (mysqli_query($mysqli, $owner_sql)) {
                /* Redirect To Login After Successful Sign Up */
                $_SESSION['success'] = 'Account created successfully';
                header('Location: ../');
                exit;
            }
        } else {
            $err = "Failed saving login information, please try again";
        }
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
