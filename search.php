<?php 
    session_start();
?>

<?php
  include 'header.php';
?>

<h1> Info Received </h1>
<p>
<?php 
    // $servername = "webapp.cs.clemson.edu";
    // $username = "myuser";
    // $password = "mypasswd";
    
    // // Create connection
    // $conn = new mysqli($servername, $username, $password);

    if(isset($_GET['search'])){
        $keyword = $_GET['search'];
        echo "name: ".$keyword."<br>";
        $query = "select * from media_keyword where keyword like ".$keyword.";";
        if($result = $conn->query($query)){
            
        }
    }else{
        echo "No Search Received<br>Please Enter Query in Search Bar";
    }

    

?>
</p>