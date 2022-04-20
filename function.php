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
        if(in_array($extension, $video_filetypes)){
            return False;
        }
        return True;
    }

    // checks if filename is an image
    function is_image_filetype($filename){
        global $img_filetypes;
        $extension = get_extension($filename);
        if(in_array($extension, $img_filetypes)){
            return False;
        }
        return True;
    }

    // checks if file extension is accepted
    function is_valid_filetype($filename){
        global $allowed_filetypes;
        $extension = get_extension($filename);
        if(in_array($extension, $allowed_filetypes)){
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
        $query = "insert into media_file values (";
        $query .= "'".generate_media_id()."', ";
        $query .= "'".$title."', ";
        $query .= "'".$username."', ";
        $query .= "'".$filepath."', ";
        $query .= "'".$type."', ";
        $query .= "'".$category."', ";
        if($allow_comments){
            $query .= "'1', ";
        }else{
            $query .= "'0', ";
        }
        $rating = 0;
        $query .= "'".$rating."', ";
        if($allow_rating){
            $query .= "'1');";
        }else{
            $query .= "'0');";
        }


        echo $query . "<br>";
    
        if($result = $conn->query($query)){
            echo "yes";
        }else{
            echo "no";
        }
    }

    function get_media(){
        global $conn;
        $query = "select * from media_file;";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function get_media_from_id($id){
        global $conn;
        $query = "select * from media_file where media_id=".$id.";";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function get_media_from_category($cat){
        global $conn;
        $query = "select * from media_file where video_category='".$cat."' limit 10;";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function get_recommended_without_current($id){
        global $conn;
        $query = "select * from media_file where media_id<>".$id." limit 10;";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function get_comments_on_current($id){
        global $conn;
        $query = "select * from comment inner join media_file on comment.media_id=media_file.media_id where comment.media_id=".$id.";";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }


    /*

        Error Code
        1: Incorrect Username
        2: Incorrect Password
        3: NULL Query Return 
        0: Authentication Pass
    */
    function find_user_in_db($username, $password){
        global $conn;
        $query = "select * from user where username='".$username."';";
        if($result = $conn->query($query)){
            if(!$num_rows = mysqli_num_rows($result)){
                return 1;
            }
            $row = mysqli_fetch_array($result);
            if($row['password'] == $password){
                return 0;
            }
            return 2;
        }
        return 3;
    }

    function user_exist($username){
        global $conn;
        $query = "select * from user where username='".$username."';";
        if($result = $conn->query($query)){
            if($num_rows = mysqli_num_rows($result)){
                return True;
            }   
        }
        return False;
    }

    function get_playlist_set($username){
        global $conn;
        $query = "select * from comment inner join media_file on comment.media_id=media_file.media_id where comment.media_id=".$username.";";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function get_subscription_set($username){
        global $conn;
        $query = "select * from subscription inner join media_file on subscription.subscriber_to_username=media_file.username where subscriber_username='".$username."';";
        if($result = $conn->query($query)){
            return $result;
        }
        return NULL;
    }

    function contact_exists($username_a, $username_b){
        global $conn;
        $query = "select * from contact where username_a='".$username_a."' and username_b='".$username_b."';";
        if($result = $conn->query($query)){
            if($num_rows = mysqli_num_rows($result)){
                return True;
            }   
        }
        return False;
    }

    function add_to_contact_db($user_a, $user_b, $type){
        global $conn;
        $query = "insert into contact values ('".$user_a."', '".$user_b."','".$type."');";
        $conn->query($query);
        return NULL; 
    }

    function edit_contact_db($user_a, $user_b){
        global $conn;
        $query = "select * from contact where username_a='".$user_a."' and username_b='".$user_b."' ;";
        $row = mysqli_fetch_array($conn->query($query));

        if($row['type'] == 'family'){
            $type = 'friend';
        }else{
            $type = 'family';
        }
        
        $query = "update contact set type='".$type."' where username_a='".$user_a."' and username_b='".$user_b."';";
        return $conn->query($query);
    }

    function remove_contact_db($user_a, $user_b){
        global $conn;
        $query = "delete from contact where username_a='".$user_a."' and username_b='".$user_b."';";
        return $conn->query($query);

    }

    function get_contacts($username){
        global $conn;
        $query = "select * from contact where username_a='".$username."';";
        if($result = $conn->query($query)){
            if(!($num_rows = mysqli_num_rows($result))){
                return NULL;
            } 
            return $result;
        }
        return NULL;
    }

?>