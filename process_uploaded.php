<?php
  include 'header.php';
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

    $target_dir = "files/vid/";
    $target_file = $target_dir.basename($_FILES['uploaded-file']['name']);
    $uploadOk = 1;
    
    if($_FILES['uploaded-file']['size'] <= 0){
        echo "File is Empty<br>";
        $uploadOk = 0;
    }
    if($uploadOk == 0){
        echo "File Could Not Be Uploaded<br>";
    }else{
        if(move_uploaded_file($_FILES['uploaded-file']['tmp_name'], $target_file)){
            echo "File ".htmlspecialchars(basename($_FILES['uploaded-file']['name']))." has been uploaded<br>";
        }else{
            echo "There was an Error Uploaded Your File<br>";
        }
    }

?>
</body>