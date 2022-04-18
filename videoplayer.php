<?php
  include 'header.php';
?>

<div class="video-left-col">
    <video class="video-obj" src="files/sample-mp4-file-small.mp4" type="video/mp4" controls>
        Your Browser does not support Video
    </video>
</div>

<div class="thumbnail-right-col">
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

            $query = "select * from media_file limit 10";

            if($result = $conn->query($query)){
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0){
                    echo "Empty Return";
                }
                else{
                    while ($row = mysqli_fetch_array($result))
                        echo $row['Tables_in_U12_Proj_DB_36ih']."<br>";
                    $result->free_result();
                }
            }else{
                echo "Query Rejected";
            }
        
        ?>
        placeholder
    </p>
</div>

<div class="video-left-col">
    Comments
    <?php
        
    ?>
</div>