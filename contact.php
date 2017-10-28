<html>
  <head>
    <?php
      include"config.php";
     ?>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
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
            <li>
              Facebook: <a class="sociallinks" href="https://www.facebook.com/">https://www.facebook.com/</a>
            </li>
            <li>
              Instagram: <a class="sociallinks" href="https://www.instagram.com/">https://www.instagram.com/</a>
            </li>
            <li>
              Youtube: <a class="sociallinks" href="https://www.youtube.com/">https://www.youtube.com/</a>
            </li>
            <li>
              Twitter: <a class="sociallinks" href="https://www.twitter.com/">https://www.twitter.com/</a>
            </li>
          </p>
        </div>

        <div id="contactright">
          <form id="contactform" action="" method="">
            <h2>Send us an e-mail!</h2>
            <h3 class="contacth3">Full name</h3>
            <input type="text" name="fullname" value="">
            <h3 class="contacth3">E-mail</h3>
            <input type="email" name="email" value="">
            <br><br>
            <textarea name="name" rows="9" cols="60"></textarea>
            <br>
            <input id="contactsubmit" type="submit" name="submit" value="Send">
          </form>
        </div>
      </div>
    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
