<?php

//CHECK YOUR CONNECTION TO THE DATABASE

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

//UPLOAD IMAGES

if(isset($_FILES['upload'])){

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
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");
    } else {

    }
    }

//ADD NEW TAGS
@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$gettags = "SELECT * FROM tags";

$stmt = $db->prepare($gettags);
$stmt->bind_result($tagid, $tag);
$stmt->execute();
if (isset($_POST['addtag'])) {

  @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');


$newtag = $_POST['tag'];

$addtag = "INSERT INTO tags(tag) VALUES(?);";

$stmt = $db->prepare($addtag);
$stmt->bind_param('s', $newtag);
$stmt->execute();

header("location:upload.php");

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

      <form id="uploadform" action="" method="post" enctype="multipart/form-data">

        <p>Upload an image</p>
        <br><br>
        <input id="uploadbutton" type="file" name="upload" value="">
        <input id="uploadtitle" type="text" name="title" placeholder="Title">
        <textarea id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>

        <br>
        <p id="choosetagsp">Choose one or several tags</p>
        <br><br>
        <p id="optionalp">(optional)</p>
        <br>


          <?php
          @ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

          $displaytagsquery ="SELECT tag FROM tags";
          $result = $db->query($displaytagsquery);

          if ($result->num_rows > 0) { ?>
            <select name="tag">
              <?php while ($row = $result->fetch_assoc()) {
                echo "<option>" . $row["tag"].  "</option>";
              }
              $db->close();                                                               //Line 98-106 was to large parts adapted from this example https://www.w3schools.com/php/showphpfile.asp?filename=demo_db_select_oo_table

          }

          ?>

        </select>

        <br>
        <input id="addTagSubmit" type="submit" name="addtag" value="﹢Add tag">
        <br>
        <input id="uploadsubmit" type="submit" name="upload" value="Upload">

      </form>

      <?php

      if(isset($error)) {
          if(empty($error)) {
              echo '<a id="uploadlinkone" href="uploadedfiles/'.$_FILES['upload']['name'].'">YOUR UPLOADED FILE'; //tagen från https://stackoverflow.com/questions/14182823/echo-image-with-php
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
