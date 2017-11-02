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
        <p>Select a username</p>
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
    include("footer.php")
     ?>
  </body>
</html>
