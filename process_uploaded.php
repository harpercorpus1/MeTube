<?php
  include 'header.php';
  include_once 'function.php'
?>

<h1> Received </h1>

<body>
<?php

    if(isset($_POST['video-title'])){
        echo "Video Title: ".$_POST['video-title']."<br>";
    }else{
        echo "Not Set";
    }
    if(isset($_FILES['uploaded-file'])){
        echo "File Found";
    }else{
        echo "File Not Found";
    }
    echo "<br>Keyword: " . $_POST['keyword'] . "<br>";
    $keyword_arr = explode(" ", $_POST['keyword']);
    foreach($keyword_arr as &$keyword){
        echo $keyword . "<br>";
    }

    // change this line when Raj finishes up the User account sequence
    $username = "harper";

    $target_dir = "files/".$username."/";
    $target_file = $target_dir.basename($_FILES['uploaded-file']['name']);
    $uploadOk = 1;
    
    echo "<br>target file: ".$target_file."<br>";
    echo "<br>target dir: ".$target_dir."<br>";

    if($_FILES['uploaded-file']['size'] <= 0){
        echo "File is Empty<br>";
        $uploadOk = 0;
    }

    $ext = get_extension($_FILES['uploaded-file']['name']);
    if(is_valid_filetype($_FILES['uploaded-file']['name'])){
        echo "Sorry File Type ". $ext . " is NOT allowed<br>Only Files with the extensions | ";
        foreach($allowed_filetypes as &$type){
            echo $type . " | ";
        }
        echo "are Allowed";
        $uploadOk = 0;
    }

    if($uploadOk == 0){
        echo "File Could Not Be Uploaded<br>";
    }else{
        if(move_uploaded_file($_FILES['uploaded-file']['tmp_name'], $target_file)){
            echo "File ".htmlspecialchars(basename($_FILES['uploaded-file']['name']))." has been uploaded<br>";
            $query = "insert into media-id";
        }else{
            echo "There was an Error Uploading Your File<br>";
        }
    }

    /* --------- NEED TO FILL ----------- */

    $username = 'harper';

    /* ---------              ----------- */


    $media_tag = get_filetype_tag($_FILES['uploaded-file']['name']);

    
    if(isset($_POST['allow-comments'])){
        $allow_comments = True;
    }else{
        $allow_comments = False;
    }

    if(isset($_POST['allow-ratings'])){
        $allow_rating = True;
    }else{
        $allow_rating = False;
    }

    $rating = 0;

    echo "media_id: " . generate_media_id() . "<br>";
    echo "title: " . $_POST['video-title'] . "<br>";
    echo "username: " . $username . "<br>";
    echo "filepath: " . $target_file . "<br>";
    echo "type: " . $media_tag . "<br>";
    echo "video_category: " . $_POST['Video-Category'] . "<br>";
    echo "allow_comments: " . $allow_comments . "<br>";
    echo "rating: " . $rating . "<br>";
    echo "allow_rating: " . $allow_rating . "<br>";

    add_new_media(
        $_POST['video-title'],
        $username,
        $target_file,
        $media_tag,
        $_POST['Video-Category'],
        isset($_POST['allow-comments']),
        isset($_POST['allow-rating'])
    );

?>
</body>