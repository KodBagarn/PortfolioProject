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
      <form class="forms" action="index.html" method="post">
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
