<?php
/* Craft Session Killer */
session_start();
unset($_SESSION['login_id']);
session_destroy();
header("Location: ../");
exit;
