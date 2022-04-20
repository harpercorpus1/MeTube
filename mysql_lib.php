<?php 
    if(session_id() == ''){
        session_start();
    }
?>

<?php 
    $servername = "mysql1.cs.clemson.edu";
    $username = "U12_Proj_DB_8lum";
    $password = "Harper_Ciara_Raj";
    $dbname = "U12_Proj_DB_36ih";

    $allowed_filetypes = array('gif', 'png', 'jpg', 'jpeg', 'mp4');
    $img_filetypes = array('gif', 'png', 'jpg', 'jpeg');
    $video_filetypes = array('mp4');

    $categories = array(
        0 => 'Comedy',
        1 => 'Sports',
        2 => 'Music',
        3 => 'Travel',
        4 => 'Games',
        5 => 'Other'
    );

    $conn = new mysqli($servername, $username, $password, $dbname);

?>