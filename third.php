<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose your quiz topic</title>
    <link rel="stylesheet" href="third.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="title">
    <img id="logoniya" src="logomo.png" width="300px "/>
    <h1 id="name"> Challenge Your Grammar</h1>
    <hr>
    <h3 id="select-name"> Select Which Topic You Want To Play</h3>
    <hr>
    <a id="one" href="preposition.php" >Prepositions<a> <br>
    <a id="two" href="article.php" >Article</a> <br>
    <a id="three" href="conjunction.php" >Conjunctions</a> <br>
    <a id="four" href="adjective.php" > Adjective</a> <br>
    <a id="five" href="Type of sentences.php" >Type of sentences</a> <br>
    </div>
</body>
</html>