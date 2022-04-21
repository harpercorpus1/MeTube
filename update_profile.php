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
<?php
    if(!isset($_GET['edit'])){
        echo "<h1>Update Profile</h1>";

        echo "<br>";
        
        echo '<a class="update-button" href="update_profile.php?edit=password">Edit Password<br></a>';
        echo '<a class="update-button" href="update_profile.php?edit=email">Edit Email<br></a>';
        echo '<a class="update-button" href="update_profile.php?edit=description">Edit Description<br></a>';
    }else if(isset($_GET['edit'])){
        if($_GET['edit'] == 'password'){
            echo "<h1>Edit Password</h1>";
            echo '<form action="edit_password.php" method="get">';
            echo "<label for='password'>Enter New Password: </label>";
            echo "<input type='password' id='password' name='password'>";
            echo "<br>";
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else if($_GET['edit'] == 'email'){
            echo "<h1>Edit Email</h1>";
            echo '<form action="edit_email.php" method="get">';
            echo "<label for='email'>Enter new Email Address: </label>";
            echo "<input type='text' id='email' name='email'>";
            echo "<br>";
            echo '<input type="hidden" name="act" value="add">';
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else if($_GET['edit'] == 'description'){
            echo "<h1>Edit User Description</h1>";
            echo '<form action="edit_description.php" method="get">';
            echo "<label for='description'>Enter New User Description: </label>";
            echo "<input type='text' id='description' name='description'>";
            echo "<br>";
            echo '<input type="hidden" name="act" value="remove">';
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else{
            //error condition
            header('Location: contact_list.php');
        }
    }else if(isset($_GET['username'])){
        echo "complete: " . $_GET['username'];
    }
?>

</div>
