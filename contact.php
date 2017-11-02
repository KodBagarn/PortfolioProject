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
      <h2>Contact us</h2>
      <div id="contactpage">
        <div id="contactleft">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>

        <div id="contactright">
          <form class="forms" action="" method="POST">
            <input type="text" name="fullname" placeholder="full name">
            <input type="email" name="email" placeholder="e-mail">
            <br><br>
            <textarea name="name" rows="6" cols="60"></textarea>
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
