<?php

session_start();

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

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

if (isset($_POST['description'])) {
    add_comment($_POST['description']);
}

if(isset($_POST['description'])){

$userdescription = $_POST['description'];
$userid = $_SESSION['userid'];

$stmt = $db->prepare("UPDATE portfolio SET description = '{$userdescription}' WHERE userid = '{$userid}'; ");
$stmt->execute();

header("location:account.php");

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
    echo "<h2>{$inputusername}´s Portfolio</h2>";

    ?>

      <form id="uploadform" action="" method="post">
        <a href="account.php"><img src="img/backicon.svg" alt=""></a>
        <br><br>
        <p>Write a short description about the contents of your portfolio!</p>
        <br>
        <textarea required id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>
        <br>
        <input id="uploadsubmit" type="submit" name="edit" value="Confirm">

      </form>

    </main>
  </body>
</html>
