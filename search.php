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
        $query = "select * from media_keyword where keyword like '".$keyword."';";
        if($result = $conn->query($query)){
            $num_rows = mysqli_num_rows($result);
            if($num_rows <= 0){
                echo "No Videos Found";
            }else{
                // For every video that was returned from the query
                // display under this tab,
                // select all media_id inner joined with media_keyword on media_id where
                // media_keyword.keyword like $keyword
            }
        }
    }else{
        echo "No Search Received<br>Please Enter Query in Search Bar";
    }

    

?>
</p>