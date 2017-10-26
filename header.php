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

    <img id="headerimg" src="img/forest.jpg">

    <h1>Creative</h1>

    <nav>
      <ul>
        <li>
          <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'account.php' || $current_page == '') ? 'active' : NULL ?>" href="account.php">Account</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'aboutus.php' || $current_page == '') ? 'active' : NULL ?>" href="aboutus.php">About us</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : NULL ?>" href="contact.php">Contact</a>
        </li>
      </ul>
    </nav>

  </body>
</html>
