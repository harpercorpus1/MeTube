<?php 
    if(session_id() == ''){
      session_start();
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/standard.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="topnav">
  <div class="header-container">
        <a href="index.php" class="home-btn">MeTube</a>
    </div>
  <div class="search-container">
    <form id="searchBar" method="get" action="search.php">
      <input id="search_content" type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
    <div>
        <a href="account.php" class="account-btn">Account</a>
    </div>
</div>