<?php

session_start();

//CHECK YOUR CONNECTION TO THE DATABASE

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

//UPLOAD TO FOLDER

if(isset($_FILES['upload'])){

    @ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

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

//UPLOAD TO DATABASE AND PORTFOLIO

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

      <form id="uploadform" action="account.php" method="post" enctype="multipart/form-data">

        <p>Upload an image</p>
        <br><br>
        <input id="uploadbutton" type="file" name="upload" value="">
        <input required id="uploadtitle" type="text" name="title" placeholder="Title">
        <textarea required id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>

        <br>
        <p id="choosetagsp">Choose one or several tags</p>
        <br><br>
        <p id="optionalp">(optional)</p>
        <br>

        <br>
        <button id="addTagSubmit" for="addtag" name="addtag" value="﹢Add tag">Add tag +</button>
        <br>
        <input id="uploadsubmit" type="submit" name="upload" value="Upload">

      </form>

      <?php

      if(isset($error)) {
          if(empty($error)) {
              echo '<a id="uploadlinkone" href="uploadedfiles/'.$newfilename.'">YOUR UPLOADED FILE';
              echo "</br>";
              echo '<a id="uploadlinktwo" href="gallerypage.php">Go to your portfolio</a>';
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
