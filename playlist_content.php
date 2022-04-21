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
  <h1>My Playlists</h1>
  <?php
    $result = get_playlist_media($_SESSION['username']);
    if(!$result or !($num_rows = mysqli_num_rows($result))){
        echo "No Playlist Media";
    }else{
        while($row = mysqli_fetch_array($result)){
            echo "filepath: " . $row['filepath'] . "<br>";
        }
    }
  ?>
</div>
