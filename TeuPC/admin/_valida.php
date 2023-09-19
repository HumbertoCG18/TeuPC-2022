<?php 

session_start();

if( empty($_SESSION['LOGIN']) || !isset($_SESSION['LOGIN'] ) ) {
    header('location: ./login.php?msg=2');
}

?>