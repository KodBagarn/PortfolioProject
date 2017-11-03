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
