<?php 
    session_start();
?>

<?php
  include 'header.php';
  include_once 'mysql_lib.php';
  include_once 'function.php';
?>


<body>

<?php
    $username = 'harper';
    $password = 'corpus';
    $email = 'hc@gmail.com';
    $description = 'hey';

    if($result = select_user_from_username($username)){
        if(mysqli_num_rows($result) != 0){
            echo "That Username is Already Taken<br>Please Go back and Try again";
        }else{
            add_user_to_db(
                $username,
                $password,
                $email,
                $description
            );
            // create directory to hold user uploaded media
            $upload_target_dir = "files/".$_POST['username']."/";
            mkdir($upload_target_dir);
        }
    }
?>

</body>