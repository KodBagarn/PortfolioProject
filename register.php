<?php

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

 ?>

<?php

function add_userinfo(){

  @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');
  $newuser = $_POST['newuser'];
  $newpassword = sha1($_POST['newpassword']);
  $newfname = $_POST['firstname'];
  $newlname = $_POST['lastname'];
  $newemail = $_POST['email'];
  $newphone = $_POST['phone'];

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

  $stmt = $db->prepare("INSERT INTO users(username, userpass, fname, lname, mail, phone)VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('sssssi', $newuser, $newpassword, $newfname, $newlname, $newemail, $newphone);
  $stmt->execute();
}

if (isset($_POST['newuser'])) {
  $testnewuser = mysqli_real_escape_string($db, $_POST['newuser']);
  $testnewpassword = sha1($_POST['newpassword']);

  $stmt = $db->prepare("SELECT * FROM users WHERE username='$testnewuser' ");
  $stmt->execute();
  $stmt->store_result();

  $totalcount1 = $stmt->num_rows();
}

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
      <form class="forms" action="" method="POST">
        <a href="account.php"><img src="img/backiconwhite.png"></a>
        <br><br>

        <p id="usernamep">Select a username *</p>
        <input required type="text" name="newuser" placeholder="Username">

        <p>Select a secure password *</p>
        <input required type="password" name="newpassword" placeholder="Password">

        <br><br><br>

        <p>First Name *</p>
        <input required type="text" name="firstname" placeholder="First Name">

        <p>Last Name *</p>
        <input required type="text" name="lastname" placeholder="Last Name">

        <p>Email *</p>
        <input required type="email" name="email" placeholder="Email">

        <p>Phone Number</p>
        <input type="text" name="phone" placeholder="Phone Number">

        <p id="mustfill">* Must be filled in</p>
        <input class= "formsubmit" id="registersubmmit" type="submit" name="register" value="Register">
      </form>
      <?php

          if (isset($_POST['newuser'])) {
            if ($totalcount1 != 0 ) {
                echo '<h2>Username already taken!</h2>';
            } else if (isset($_POST['newuser']) && isset($_POST['newpassword']) && isset($_POST['firstname'])&& isset($_POST['lastname'])&& isset($_POST['email'])&& isset($_POST['phone'])){
              add_userinfo();
              echo '<h2>Thanks for registering and Welcome to the Colony!</h2>';

              die("<script>location.href = 'http://localhost:/portfolioProject/portfolioProject/account.php'</script>");
            }
          }

      ?>
    </main>
    <?php
    include("footer.php");
     ?>
  </body>
</html>
