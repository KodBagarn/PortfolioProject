<?php

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment) {

	@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

	#here we add the html entities and string escaping
	$comment= htmlentities($comment);
	$comment = mysqli_real_escape_string($db, $comment);


	#<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
	#try the iframe after you add the "htmlentities"

	$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
	$stmt = $db->prepare($query);
	$stmt->execute();
}

#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

function get_comment() {

	@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

	$query = ("SELECT comment FROM comments");
	$stmt = $db->prepare($query);
	$stmt->bind_result($result);
	$stmt->execute();

    while ($stmt->fetch()) {
        echo $result;
        echo "<hr/>";
    }
}
//
// #here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['fullname'])) {
    add_comment($_POST['fullname']);
}

if (isset($_POST['email'])) {
    add_comment($_POST['email']);
}

if (isset($_POST['message'])) {
    add_comment($_POST['message']);
}

#here we call all comments to be shown by simply calling the get_comment function
//get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
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
