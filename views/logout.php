<?php
/* Craft Session Killer */
session_start();
unset($_SESSION['admin_id']);
session_destroy();
header("Location: ../");
exit;
