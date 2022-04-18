<?php 
    session_start();
?>

<?php
  include 'header.php';
?>

<p>hello</p>

<p>
    <!-- mysql -h mysql1.cs.clemson.edu -u U12_Proj_DB_8lum -p U12_Proj_DB_36ih -->
    placeholder
    <?php 
        $servername = "mysql1.cs.clemson.edu";
        $username = "U12_Proj_DB_8lum";
        $password = "Harper_Ciara_Raj";
        $dbname = "U12_Proj_DB_36ih";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: . $conn->connect_error");
        }
        echo "Connected Successfully";

        $query = "SHOW TABLES";

        if($result = $conn->query($query)){
            while ($row = mysqli_fetch_array($result))
                echo $row['Tables_in_U12_Proj_DB_36ih']."<br>";
            $result->free_result();
        }else{
            echo "Query Rejected";
        }
    
    ?>
    placeholder
</p>
