<?php 
    session_start();
?>

<?php
  include 'header.php';
?>

<div class="container">
  <form action="process_signup.php" method="post">
    <div class="row">
      <h2 style="text-align:center">Sign Up</h2>

    <div class="login-inputs">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="description" placeholder="Description" required>
        <input class="submit-button" type="submit" value="Sign Up">
    </div>

    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
      <a href="login.php" style="color:white" class="btn">Not New to MeTube? Log in here</a>
    </div>
</div>