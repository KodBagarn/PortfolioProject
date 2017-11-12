<?php

session_start();
include("config.php");





//$imageid = $_SESSION['imageid'];
//$userid = $_SESSION['userid'];


//CHECK YOUR CONNECTION TO THE DATABASE

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

    <?php
    $inputusername = ($_SESSION['username']);
    $userid = ($_SESSION['userid']);
    echo "<h2>{$inputusername}´s Portfolio</h2>";


    @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }




    $imageid = trim($_GET['imageid']);
    echo '<INPUT type="hidden" name="imageid" value=' . $imageid . '>';

    $imageid = trim($_GET['imageid']);
    $imageid = addslashes($imageid);




      $stmt = $db->prepare("DELETE FROM images WHERE imageid = '{$imageid}'");
      $stmt->execute();

      echo '<p id="imgdeletedp">Image deleted</p>';
      echo "<br>";
      echo '<a id="delelinkback" href="account.php">Return to Account</a> ';
      exit;


    //header("location:account.php");
    //$stmt->bind_result();



        // Prepare an update statement and execute it
        // $statement = $db->prepare("UPDATE books SET reserved=1 WHERE bookid = ?");
        // $statement->bind_param('i', $bookid);
        // $statement->execute();
        // printf("<br>Book Reserved!");
        // printf("<br><a href=browseBooks.php>Search and Book more Books </a>");
        // printf("<br><a href=myBooks.php>Return to Reserved Books </a>");
        // printf("<br><a href=home.php>Return to home page </a>");
        // exit;





    ?>





    </main>
  </body>
</html>
