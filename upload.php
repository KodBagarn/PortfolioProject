<?php

session_start();

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

function add_comment($comment) {

	@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

	$comment= htmlentities($comment);
	$comment = mysqli_real_escape_string($db, $comment);

	$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
	$stmt = $db->prepare($query);
	$stmt->execute();
}

if (isset($_POST['upload'])) {
    add_comment($_POST['upload']);
}

if (isset($_POST['title'])) {
    add_comment($_POST['title']);
}

if (isset($_POST['description'])) {
    add_comment($_POST['description']);
}

if(isset($_FILES['upload'])){

    @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

    $allowedextensions = array('jpeg', 'png', 'jpg');
    $extension = strtolower(substr($_FILES['upload']['name'], strpos($_FILES['upload']['name'], '.') +1));

    $error = array();

    if(in_array($extension, $allowedextensions) === false) {
        $error[] = "<p id=errortextone>This file does not have an allowed extension</p>";
    }

    if($_FILES['upload']['size']>10000000) {
        $error[] = "<p id=errortexttwo>Your file is too big</p>";
    }

    if(empty($error)) {

        $filename = $_FILES['upload']['name'];

        $newfilename =$_SESSION['userid']."_".$filename;
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$newfilename}");
    } else {

    }

  ?>

  <?php

  if (isset($_POST['upload'])) {
    $uploadedimage = "uploadedfiles/{$newfilename}";
  }

  if (isset($_POST['title'])) {
    $uploadedtitle = $_POST['title'];
  }

  if (isset($_POST['description'])) {
    $uploadeddescription = $_POST['description'];
  }

  if (isset($_SESSION['username'])) {
    $userid = ($_SESSION['userid']);
  }



  $query = ("INSERT INTO images(title, description, link, userid) VALUES ('{$uploadedtitle}', '{$uploadeddescription}', '{$uploadedimage}', '{$userid}')");
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

      <?php
      $inputusername = ($_SESSION['username']);
      $userid = ($_SESSION['userid']);
      echo "<h2 id=uploadh2>{$inputusername}´s Portfolio</h2>";

      ?>

      <form id="uploadform" method="post" enctype="multipart/form-data">
        <a href="account.php"><img src="img/backicon.svg" alt=""></a>
        <br><br>
        <p>Upload an image</p>
        <br><br>
        <input required id="uploadbutton" type="file" name="upload" value="">
        <input required id="uploadtitle" type="text" name="title" placeholder="Title">
        <textarea required id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>
        <input id="uploadsubmit" type="submit" name="upload" value="Upload">

      </form>

      <?php

      if(isset($error)) {
          if(empty($error)) {
              echo '<p id="uploadsuccess">SUCCESSFUL UPLOAD!</p>';
              echo '<a id="uploadlinktwo" href="account.php">Go to your portfolio</a>';
          } else {
              foreach ($error as $err) {
              echo $err;
              echo '</br>';
              }
          }
      }

      ?>

    </main>
  </body>
</html>
