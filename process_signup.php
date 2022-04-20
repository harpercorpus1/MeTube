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
    if(isset($_POST['username'])){
        echo "username: " . $_POST['username']."<br>";
        echo "password: " . $_POST['password']."<br>";
        echo "email: " . $_POST['email']."<br>";
        echo "description: " . $_POST['description']."<br>";
    }
    $query = "select * from user where username like '".$username."';";

    if($result = $conn->query($query)){
        if(mysqli_num_rows($result) != 0){
            echo "That Username is Already Taken<br>Please Go back and Try again";
        }else{
            add_user_to_db(
                $_POST['username'], 
                $_POST['password'],
                $_POST['email'],
                $_POST['description']
            );
            // create directory to hold user uploaded media
            $upload_target_dir = "files/".$_POST['username']."/";
            mkdir($upload_target_dir);
        }
    }
?>

</body>