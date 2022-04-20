<?php
  include 'header.php';
  include_once 'function.php';
  include_once 'mysql_lib.php';
?>

<?php
    $media_id = $_GET['media-id'];

    $result = mysqli_fetch_array(get_media_from_id($media_id));
    
    $filename = $result['filepath'];

    $query = "select * from media_file where title not like 'bunny' limit 10";
    echo '<div class="video-left-col">';
        echo '<video class="video-obj" src='.$filename.' type="video/mp4" controls>';
?>
            Your Browser does not support Video
        </video>
    </div>

<div class="thumbnail-right-col">
    <h1>
        Recommended Media
    </h1>

    <p>
        <?php 
            $result = get_recommended_without_current($media_id);

            if($result == NULL or !($num_rows = mysqli_num_rows($result))){
                echo "No Recommended Media at This Time";
            }else{
                for($i = 0; $i < $num_rows; $i++){
                    $row = mysqli_fetch_array($result);
                    echo $row['filepath']. "<br>";
                }
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
            $result = get_comments_on_current($media_id);
            if($result == NULL or !($num_rows = mysqli_num_rows($result))){
                echo "This Video has no Comments";
            }else{
                $num_rows = mysqli_num_rows($result);
                for($i = 0; $i < $num_rows; $i++){
                    $row = mysqli_fetch_array($result);
                    echo $row['username'] . ": " . $row['comment_content']. "<br>";
                }
            }
        
        ?>
    </p>
</div>