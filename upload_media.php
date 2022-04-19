<?php
  include 'header.php';
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
    <form action="process_uploaded.php" method="post" enctype="multipart/form-data">
    Media Title: <input type="text" name="video-title"><br>
    <input type="checkbox" name="allow-comments">Allow Comments?<br>
    <input type="checkbox" name="allow-rating">Allow Rating?<br>
    Video Category:<br>
    <?php
        $radio_name = "Video-Category";
        $categories = array(
            0 => 'Comedy',
            1 => 'Sports',
            2 => 'Music',
            3 => 'Travel',
            4 => 'Games'
        );
        foreach($categories as &$key){
            echo '&ensp; <input type="radio" id='.$key.'-radio name='.$radio_name.' value='.$key.'>';
            echo '<label for='.$key.'-radio>'.$key.'</label><br>';
        }
    ?>
    <input type="file" name="uploaded-file" id="uploaded-file">
    <input type="submit" style="width: 100px;">


    </form>
</body>