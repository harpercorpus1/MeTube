<?php
  if(session_id() == ''){
    session_start();
  }

  include 'header.php';
  include_once 'mysql_lib.php';
  include_once 'function.php';
  // include_once 'functions.php;'

  // $user_data = check_login($conn);
?>



<div class="sidebar">
  <a href="index.php?cat=Home">Home</a>
  <?php
    foreach($categories as &$key){
      echo '<a href="index.php?cat='.$key.'">'.$key.'</a>';
    }
  ?>
</div>


<p>
  hello 
</p>
<div class='anti-sidebar'>
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "Welcome to MeTube, " . $_SESSION['username'] . "!";
    }
    echo "<br>";
  ?>

  <?php
    if(isset($_GET['cat'])){
      $cat = $_GET['cat'];
    }else{
      $cat = 'Home';
    }

    if($cat == 'Home'){
      $result = get_media();
    }else{
      $result = get_media_from_category($cat);
    }

    echo "<h2>Media: ".$cat."</h2>";
    if($result == NULL or !($num_rows = mysqli_num_rows($result))){
      echo "No Media Available<br>";
    }else{
      while($row = mysqli_fetch_array($result)){
        img_labeled($row['media_id'], $row['title'], $row['username']);
        // echo "filepath: " . $row['filepath'] . "<br>";
      }
    }

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      $result = get_playlist_set($_SESSION['username']);
      echo "<h2>Playlist</h2>";
      if($result == NULL or !($num_rows = mysqli_num_rows($result))){
        echo "No Media Available<br>";
      }else{
        while($row = mysqli_fetch_array($result)){
          echo "filepath: " . $row['filepath'] . "<br>";
        }
      }

      $result = get_subscription_set($_SESSION['username']);
      echo "<h2>Subscriptions</h2>";
      if($result == NULL or !($num_rows = mysqli_num_rows($result))){
        echo "No Media Available<br>";
      }else{
        while($row = mysqli_fetch_array($result)){
          echo "filepath: " . $row['filepath'] . "<br>";
        }
      }
    }

  ?>
</div>
