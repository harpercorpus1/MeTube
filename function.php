<?php
    include "mysql_lib.php";

    // returns the extension of the provided filename
    function get_extension($filename){
        return pathinfo(basename($filename), PATHINFO_EXTENSION);
    }

    // checks if filename is a video 
    function is_video_filetype($filename){
        global $video_filetypes;
        $extension = get_extension($filename);
        if(!in_array($extension, $video_filetypes)){
            return False;
        }
        return True;
    }

    // checks if filename is an image
    function is_image_filetype($filename){
        global $img_filetypes;
        $extension = get_extension($filename);
        if(!in_array($extension, $img_filetypes)){
            return False;
        }
        return True;
    }

    // checks if file extension is accepted
    function is_valid_filetype($filename){
        global $allowed_filetypes;
        $extension = get_extension($filename);
        if(!in_array($extension, $allowed_filetypes)){
            return False;
        }
        return True;
    }

    // gets the tag necessary for the type of the file (img or video)
    function get_filetype_tag($filename){
        if(is_video_filetype($filename)){
            return 'vid';
        }else if(is_image_filetype($filename)){
            return 'img';
        }
        return NULL;
    }

    function add_user_to_directory($username){
        $query = "";
    }

    function add_user_to_db($username, $password, $email, $description){
        global $conn;
        $query = "insert into user values ('".$username."', '".$password."', '".$email."', '".$description."');";
        echo $query . "<br>";

        if($conn == NULL){
            echo "NULL<br>";
        }
        if($result = $conn->query($query)){
            return True;
        }
        return NULL;
    }

    function select_user_from_username($username){
        global $conn;
        $query = "select * from user where username='".$username."';";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function generate_media_id(){
        global $conn;
        $query = "select * from media_file;";
        if($result = $conn->query($query)){
            return mysqli_num_rows($result);
        }
        return NULL;
    }

    function add_new_media($title, $username, $filepath, $type, $category, $allow_comments, $allow_rating){
        global $conn;
        $query = "insert into media_file (";
        $query .= "'".generate_media_id()."', ";
        $query .= "'".$username."', ";
        $query .= "'".$filepath."', ";
        $query .= "'".$type."', ";
        $query .= "'".$category."', ";
        $query .= "'".$allow_comments."', ";
    }

?>