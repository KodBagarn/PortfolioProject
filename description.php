<?php

session_start();

//CHECK YOUR CONNECTION TO THE DATABASE

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}



if(isset($_POST['description'])){

  if (isset($_SESSION['username'])) {
    $userid = ($_SESSION['userid']);
  }
  $inputusername = ($_SESSION['username']);
  $title = $inputusername."s Portfolio";
  $description = $_POST['description'];



  $query =("INSERT INTO portfolio(title, description, userid) VALUES ('{$title}', '{$description}', '{$userid}')");
  $stmt = $db->prepare($query);
  $stmt->execute();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
  </head>
  <body id="uploadbody">
    <main id="uploadmain">
      <br>
      <br>
      <br>
    <?php
    $inputusername = ($_SESSION['username']);
    $userid = ($_SESSION['userid']);
    echo "<h2>{$inputusername}´s Portfolio</h2>";


    ?>




      <form id="uploadform" action="account.php" method="post">

        <p>Write a short description about the contents of your portfolio!</p>
        <br>
        <textarea required id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>

        <br>
        <input id="uploadsubmit" type="submit" name="edit" value="Confirm">

      </form>




    </main>
  </body>
</html>
