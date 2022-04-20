<?php 
    if(session_id() == ''){
        session_start();
    }
?>

<?php
  include 'header.php';
  include_once 'function.php';
  include_once 'mysql_lib.php';
?>

<?php
    if(!find_user_in_db($_GET['username'], $_GET['password'])){
        echo "user found";
        $_SESSION['loggedin'] = True;
        $_SESSION['username'] = $_GET['username'];
    }else{
        echo "user not found";
    }
   
?>