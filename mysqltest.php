<?php 
    session_start();
?>

<?php
  include 'header.php';
  include_once 'mysql_lib.php'
?>

<p>hello</p>

<div class="video-left-col">
    <p>
        <!-- mysql -h mysql1.cs.clemson.edu -u U12_Proj_DB_8lum -p U12_Proj_DB_36ih -->
        placeholder
        <?php 
            $query = "describe comment";

            if($result = $conn->query($query)){
                while ($row = mysqli_fetch_array($result))
                    for($i = 0; $i <= (count($row)-1) / 2; $i++){
                        echo $row[$i];
                    }
                    echo "<br>";
                $result->free_result();
            }else{
                echo "Query Rejected";
            }
        
        ?>
        placeholder
    </p>

</div>

<div class="thumbnail-right-col">
    <p>
        Thumbnails go here
    </p>
</div>