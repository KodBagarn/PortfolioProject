<?php
@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}
 ?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



#we can create a function to add comments
#basically it inserts a comment in a database.

function add_userinfo(){

  @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

  $newuser = $_POST['newuser'];
  $newpassword = $_POST['newpassword'];
  $newfname = $_POST['firstname'];
  $newlname = $_POST['lastname'];
  $newemail = $_POST['email'];
  $newphone = $_POST['phone'];



  #here we add the html entities and string escaping
  $newuser= htmlentities($newuser);
  $newuser = mysqli_real_escape_string($db, $newuser);

  $newpassword= htmlentities($newpassword);
  $newpassword = mysqli_real_escape_string($db, $newpassword);

  $newfname= htmlentities($newfname);
  $newfname = mysqli_real_escape_string($db, $newfname);

  $newlname= htmlentities($newlname);
  $newlname = mysqli_real_escape_string($db, $newlname);

  $newemail= htmlentities($newemail);
  $newemail = mysqli_real_escape_string($db, $newemail);

  $newphone= htmlentities($newphone);
  $newphone = mysqli_real_escape_string($db, $newphone);

  #<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
  #try the iframe after you add the "htmlentities"

  $stmt = $db->prepare("INSERT INTO users(username, userpass, fname, lname, mail, phone) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt = bind_param('sssssi', $newuser, $newpassword, $newfname, $newlname, $newemail, $newphone);
  //echo $query;
  $stmt->execute();
}





#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

function get_user(){

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

$query = ("SELECT username FROM users");
$stmt = $db->prepare($query);
$stmt->bind_result($result);
$stmt->execute();


    while ($stmt->fetch()) {
        echo $result;
        echo "<hr/>";

    }

}


#here we test if the POST has been submited
#if yes, we call the function 'add_userinfo' which will add a new comment in the DB
if (isset($_POST['newuser']) && isset($_POST['newpassword']) && isset($_POST['firstname'])&& isset($_POST['lastname'])&& isset($_POST['email'])&& isset($_POST['phone'])){
    add_userinfo();
}




#here we call all comments to be shown by simply calling the get_user function
get_user();

#you can also store this in a variable and use later
# $allcomment = get_user();

/*
if(username = username) {
  echo "username already taken";
} elseif (password = password){
  echo "password already taken";
}if else{
  $query =("INSERT INTO users VALUES ('{$user}') ")
};
*/

?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Creative Colony</title>
  </head>
  <body>
    <header>
      <?php
      include("header.php");
       ?>
    </header>
    <main>
      <br>
      <form class="forms" action="" method="post">
        <a href="account.php"><img src="img/backiconwhite.png"></a>
        <br><br>

        <p id="usernamep">Select a username</p>
        <input type="text" name="newuser" placeholder="Username">

        <p>Select a secure password</p>
        <input type="text" name="newpassword" placeholder="Password">

        <br><br><br>

        <p>First Name</p>
        <input type="text" name="firstname" placeholder="First Name">

        <p>Last Name</p>
        <input type="text" name="lastname" placeholder="Last Name">

        <p>Email</p>
        <input type="email" name="email" placeholder="Email">

        <p>Phone Number</p>
        <input type="text" name="phone" placeholder="Phone Number">

        <input class= "formsubmit" type="submit" name="register" value="Register">
      </form>

    </main>
    <?php
    include("footer.php");
     ?>
  </body>
</html>
