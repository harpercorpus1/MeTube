<?php
  include 'header.php';
  include_once 'function.php';
  include_once 'mysql_lib.php';
?>

<h1> Received </h1>

<body>
<?php
    $username=$_SESSION['username'];
    if(isset($_POST['video-title'])){
        echo "Video Title: ".$_POST['video-title']."<br>";
    }else{
        echo "Not Set";
        return;
    }
    if(isset($_FILES['uploaded-file'])){
        echo "File Found";
    }else{
        echo "File Not Found";
        return ;
    }
    $keyword_arr = explode(" ", $_POST['keyword']);

    $target_dir = "files/".$username."/";
    $target_file = $target_dir.basename($_FILES['uploaded-file']['name']);
    $uploadOk = 1;

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

    add_new_media(
        $_POST['video-title'],
        $username,
        $target_file,
        $media_tag,
        $_POST['Video-Category'],
        isset($_POST['allow-comments']),
        isset($_POST['allow-rating'])
    );

    $keyword_arr = explode(" ", $_POST['keyword']);
    $media_id = generate_media_id()-1;
    foreach($keyword_arr as &$keyword){
        add_to_keyword($media_id, $keyword);
    }

?>
</body>