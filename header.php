<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <title></title>
  </head>
  <body>

    <div id="logindiv">
        <a id="login" href="#">Log in</a>
    </div>

    <img id="headerimg" src="img/phpprojectheader.jpg">


    <nav>
      <ul>
        <li>
          <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'account.php') ? 'active' : NULL ?>" href="account.php">Account</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'aboutus.php') ? 'active' : NULL ?>" href="aboutus.php">About us</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a>
        </li>
      </ul>
    </nav>

  </body>
</html>
