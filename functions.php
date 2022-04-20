<?php

function check_login($conn)
{
    if(isset($_SESSION['username']))
    {
        $user = $_SESSION['username'];
        $query = "select * from user where username = '$username' limit 1";
    
        $result = mysqli_query($con,$query);
    }


}