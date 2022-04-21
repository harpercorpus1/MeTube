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
        if(isset($_GET['email'])){
            $result = edit_email($_SESSION['username'], $_GET['email']);
            if($result){
                echo "Password List Successfully Updated";
            }else{
                echo "Error Updating Password within Database";
            }
        }else{
            echo "No new Password Provided";
        }

    ?>
</div>