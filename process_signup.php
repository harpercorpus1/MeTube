<?php 
    session_start();
?>

<?php
  include 'header.php';
  include_once 'mysql_lib.php'
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
        if(mysqli_num_rows($result) >= 1){
            echo "That Username is Already Taken<br>Please Go back and Try again";
        }else{
            $query = "insert into user values ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['description']."');";
            echo $query;
            if($result = $conn->query($query)){
                echo "Query Success<br>";
            }else{
                echo "Query Broken<br>";
            }
        }
    }
?>

</body>