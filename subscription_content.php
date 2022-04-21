<?php 
  if(session_id() == ''){
      session_start();
  }
?>

<?php
  include 'header.php';
  include_once 'function.php';
  include 'account_sidebar.php';
?>

<div class="anti-sidebar">
  <h1>My Content</h1>
  <?php
    $result = get_personal_media($_SESSION['username']);
    if(!$result or !($num_rows = mysqli_num_rows($result))){
        echo "No Personal Media";
    }else{
        while($row = mysqli_fetch_array($result)){
            img_labeled($row['media_id'], $row['title'], $row['username']);
        }
    }

    $result = get_playlist_media($_SESSION['username']);
    if(!$result or !($num_rows = mysqli_num_rows($result))){
        echo "No Playlist Media";
    }else{
        while($row = mysqli_fetch_array($result)){
            img_labeled($row['media_id'], $row['title'], $row['username']);
        }
    }
  ?>
</div>
