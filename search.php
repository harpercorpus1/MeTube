<?php 
    session_start();
?>

<?php
  include 'header.php';
  include_once 'mysql_lib.php'
?>

<h1> Info Received </h1>
<p>
<?php 

    if(isset($_GET['search'])){
        $keyword = $_GET['search'];
        echo "name: ".$keyword."<br>";
        $query = "select * from media_keyword where keyword like '".$keyword."';";
        if($result = $conn->query($query)){
            $num_rows = mysqli_num_rows($result);
            echo "number of rows: ".$num_rows."<br>";
        }
    }else{
        echo "No Search Received<br>Please Enter Query in Search Bar";
    }

    

?>
</p>