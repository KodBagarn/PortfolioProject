<?php

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment){

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

#the mysqli_real_espace_string function helps us solve the SQL Injection
#it adds forward-slashes in front of chars that we can't store in the username/pass
#in order to excecute a SQL Injection you need to use a ' (apostrophe)
#Basically we want to output something like \' in front, so it is ignored by code and processed as text

#here we add the html entities and string escaping
$comment= htmlentities($comment);
$comment = mysqli_real_escape_string($db, $comment);

#<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
#try the iframe after you add the "htmlentities"

$query = ("INSERT INTO comments(comment) VALUES ('$comment')");
$stmt = $db->prepare($query);
$stmt->execute();
}

#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

function get_comment(){

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

$query = ("SELECT comment FROM comments");
$stmt = $db->prepare($query);
$stmt->bind_result($result);
$stmt->execute();

    while ($stmt->fetch()) {
        echo $result;
        echo "<hr/>";
    }
}

#here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['username'])) {
    add_comment($_POST['username']);
}
if (isset($_POST["password"])) {
    add_comment($_POST["password"]);
}

#here we call all comments to be shown by simply calling the get_comment function
get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
?>



<?php

if (isset($_POST['username'], $_POST['password'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);

    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use
    #' OR '1'='1' #
    #$uname = $_POST['username'];

    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.

    $upass = sha1($_POST['password']);

    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql


    $stmt = $db->prepare("SELECT * FROM users WHERE username = '$uname' '.' AND userpass = '$upass'");
    $stmt->execute();
    $stmt->store_result();

    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();

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
      <h2>Account</h2>

      <?php

        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h4>Wrong password! Try again.</h4>';
            } else {
                echo '<h4>Welcome! Correct password.</h4>';
            }
        }
        ?>

      <form class="forms" action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input class="formsubmit" type="submit" name="login" value="Log in">
        <br>
        <a href="register.php">Don't have an account? Click me!</a>
      </form>
<?php // visa log in form om inte inloggad, ta bort när inloggad, file upload, form för namn, tags och beskrivning av bilden, val att göra portfolion public eller secret. kunna uppdatera bilder och ta bort dem ?>

    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
