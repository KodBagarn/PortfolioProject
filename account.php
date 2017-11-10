<?php


  include"config.php";
  include("header.php");


@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment) {

	@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

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

// function get_comment() {
//
// 	@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');
//
// 	$query = ("SELECT comment FROM comments");
// 	$stmt = $db->prepare($query);
// 	$stmt->bind_result($result);
// 	$stmt->execute();
//
//     while ($stmt->fetch()) {
//         echo $result;
//         echo "<hr/>";
//     }
// }
//
// #here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['username'])) {
    add_comment($_POST['username']);
}

if (isset($_POST['password'])) {
    add_comment($_POST['password']);
}

#here we call all comments to be shown by simply calling the get_comment function
//get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
?>

<?php



if(isset($_POST['username'], $_POST['password'])) {
    $inputusername = stripslashes($_POST['username']);
    $inputuserpass = stripslashes($_POST['password']);

    @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

    $query = ("SELECT userid, username, userpass FROM users WHERE username = ?");
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $inputusername);
    $stmt->execute();
    $stmt->bind_result($userid, $username, $userpass);


    //$stmt->store_result();

    echo $userpass;

    while($stmt->fetch()){

    if($userpass == sha1($inputuserpass)) {
      $_SESSION['username'] = $inputusername;
       $_SESSION['userid'] = $userid;
      header("refresh:0");
      exit();


    } else {
      echo "<h3 id=\"wrongtext\">Wrong username or password!</h3>";
        //echo "<h3 id=\"welcometext\">Welcome $inputusername!</h3>";

    }
}

    //$totalcount = $stmt->num_rows();
}
?>




<html>
  <head>

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <title>Creative Colony</title>
  </head>
  <body>
    <header>
      <?php

      ?>
    </header>
    <main>

      <?php



     //   if(isset($_SESSION['username'])){
     //   $inputusername = $_SESSION['username'];
     //   $stmt=$db->prepare("SELECT userid FROM users WHERE username ='$inputusername' AND userid =(?)");
     //   $stmt->bind_param('i', $userid);
     //   $stmt->execute();
     //   echo "$inputusername";
     //   echo "$userid";
     // }


     if (!isset($_SESSION['username'])) {
       ?>


      <h2>Account</h2>

      <form class="forms" action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input class="formsubmit" type="submit" name="login" value="Log in">
        <br>
        <a href="register.php">Don't have an account? Click me!</a>
      </form>

        <?php }elseif (isset($_SESSION['username'])) {
          $inputusername = ($_SESSION['username']);
          $userid = ($_SESSION['userid']);
          echo ("<h2>{$inputusername}´s Portfolio</h2>");

          ?>
        <a id="uploadlink" href="upload.php" > Expand your portfolio with more fantastic content</a>
      <?php
        }
      ?>





    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
