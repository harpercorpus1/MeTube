<?php
  include 'header.php';
  include_once 'mysql_lib.php'
?>

<?php
    $filepath = $conn->
    $query = "select * from media_file where title not like 'bunny' limit 10";
    echo '<div class="video-left-col">';
        echo'<video class="video-obj" src='.$filename'. type="video/mp4" controls>'
            Your Browser does not support Video
        </video>
    </div>
?>
<div class="thumbnail-right-col">
    <h1>
        Recommended Videos
    </h1>

    <p>
        <?php 
            $query = "select * from media_file where title not like bunny limit 10";

            echo '<br>';

            if($result = $conn->query($query)){
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0){
                    echo "Empty Return";
                }
                else{
                    while ($row = mysqli_fetch_array($result)){
                        for($i = 0; $i <= (count($row)-1) / 2; $i++){
                            echo $row[$i];
                        }
                        echo "<br>";
                    }
                    $result->free_result();
                }
            }else{
                echo "Query Rejected";
            }
        
        ?>
    </p>
</div>

<div class="video-left-col">
<h1>
        Comments
    </h1>

    <p>
        <?php 
            $query = "select * from media_file limit 10";

            echo '<br>';

            if($result = $conn->query($query)){
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0){
                    echo "Empty Return";
                }
                else{
                    while ($row = mysqli_fetch_array($result)){
                        for($i = 0; $i <= (count($row)-1) / 2; $i++){
                            echo $row[$i];
                        }
                        echo "<br>";
                    }
                    $result->free_result();
                }
            }else{
                echo "Query Rejected";
            }
        
        ?>
    </p>
</div>