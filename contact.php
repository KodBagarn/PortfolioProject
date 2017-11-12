<?php

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

if (isset($_POST['fullname'])) {
    add_comment($_POST['fullname']);
}

if (isset($_POST['email'])) {
    add_comment($_POST['email']);
}

if (isset($_POST['message'])) {
    add_comment($_POST['message']);
}

?>

<html>
  <head>
    <?php
      include"config.php";
     ?>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <title>Creative Colony</title>
  </head>
  <body>
    <header>
      <?php
        include("header.php");
      ?>
    </header>
    <main>
      <h2 id="contacth2">Contact us</h2>
      <div id="contactpage">
        <div id="contactleft">
          <p>
            If you have any questions you are more than welcome to contact us by filling in the form down below.
            You can also follow us on social media for regular updates. You will find the links at the bottom of the page!
            <br><br>
            <b>Phone:</b> 036-204597
            <br>
            <b>Opening hours:</b> 08:00-17:30
          </p>
        </div>

        <div id="contactright">
          <form class="forms" action="" method="POST">
            <input type="text" name="fullname" placeholder="Full name">
            <input type="email" name="email" placeholder="E-mail">
            <br><br>
            <textarea name="message" rows="6" cols="60"></textarea>
            <br>
            <input class="formsubmit" type="submit" name="submit" value="Send">
          </form>
        </div>
      </div>
    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
