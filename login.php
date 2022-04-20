<?php 
    session_start();
?>

<?php
  include 'header.php';
  include_once 'mysql_lib.php'
?>

<div class="container">
  <form action="action_page.php">
    <div class="row">
      <h2 style="text-align:center">Login</h2>

    <div class="login-inputs">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input class="submit-button" type="submit" value="Login">
    </div>

    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
      <a href="signup.php" style="color:white" class="btn">New to MeTube? Sign up here</a>
    </div>
</div>