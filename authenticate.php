<?php
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    $_SESSION['message'] = "Login to continue";
}
