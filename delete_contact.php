<?php 
    session_start();
?>

<?php
  include 'header.php';
  include 'account_sidebar.php';
  include_once 'mysql_lib.php';
  include_once 'function.php';
?>
<div class="anti-sidebar">
    <?php 
        if(user_exist($_GET['username']) and contact_exists($_SESSION['username'], $_GET['username'])){
            $result = remove_contact_db(
                $_SESSION['username'], 
                $_GET['username']
            );
            if($result){
                echo "Contact List Successfully Updated<br>";
            }else{
                echo "Error Removing Contact from Database<br>";
            }
        }else if(!user_exist($_GET['username'])){
            echo "Error: User: ".$_GET['username']. " Does not Exist<br>";
        }else{
            echo "Error: Contact list Connection Does not exist<br>";
        }
    ?>
</div>