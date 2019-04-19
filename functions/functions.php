<?php 
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $conn = mysqli_connect('127.0.0.1','root','','movierev');

    function throwError($errormsg){
        echo '<div class="alert alert-danger mb-0" role="alert">'.$errormsg.'</div>';
    }