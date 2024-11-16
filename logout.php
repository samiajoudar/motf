<?php
session_start();
if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['message'] = "Logout Successfully";
    $_SESSION['message_type'] = "warning";
}
header('Location: index.php');
exit();
