<?php 
    session_start();
?>

<?php 
    $servername = "mysql1.cs.clemson.edu";
    $username = "U12_Proj_DB_8lum";
    $password = "Harper_Ciara_Raj";
    $dbname = "U12_Proj_DB_36ih";

    $allowed_filetypes = array('gif', 'png', 'jpg', 'jpeg', 'mp4');
    $img_filetypes = array('gif', 'png', 'jpg', 'jpeg');
    $video_filetypes = array('mp4');

    $conn = new mysqli($servername, $username, $password, $dbname);

?>