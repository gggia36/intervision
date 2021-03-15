<?php session_start();
if (!empty($_POST['capcode'])) {
    $_SESSION['capcode'] = $_POST['capcode'];
    echo '1';
}
exit;
