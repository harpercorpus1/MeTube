<?php
  include 'header.php';
  include_once 'function.php';
  include_once 'mysql_lib.php';
?>

<h1> Fill out Form below to upload media <h1>

<!-- 
media_id
title
username
filepath
video_category
allow_comments
rating
allow_rating
keyword

-->
<body>
    <form class="upload-form-text" action="process_uploaded.php" method="post" enctype="multipart/form-data">
    Media Title: <input type="text" name="video-title"><br>
    <input type="checkbox" name="allow-comments">Allow Comments?<br>
    <input type="checkbox" name="allow-rating">Allow Rating?<br>
    Video Category:<br>
    <?php
        $radio_name = "Video-Category";
        
        foreach($categories as &$key){
            echo '&ensp; <input type="radio" id='.$key.'-radio name='.$radio_name.' value='.$key.'>';
            echo '<label for='.$key.'-radio>'.$key.'</label><br>';
        }
    ?>
    Enter Keywords for file (space separated): <input type="text" name="keyword" id="keyword">
    <input type="file" name="uploaded-file" id="uploaded-file">
    <input type="submit" style="width: 100px;">


    </form>
</body>