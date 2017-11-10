<?php
  ini_set('session.cookie_httponly', true);

  session_start();

  if (isset($_SESSION['userip']) === false) {
      $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
  }

  if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
      session_unset();
      session_destroy();
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <title>Creative Colony</title>
  </head>
  <body>

    <div id="logindiv">
      <?php if(!isset($_SESSION['username'])){ ?>
        <a class="login" href="account.php">Log in</a>
      <?php }elseif(isset($_SESSION['username'])){ ?>
        <a class="login" href="logout.php">Log out</a>
        <?php } ?>
    </div>

    <img id="headerimg" src="img/logo.png">

    <a id="hamburger" class="open" href="#"><img src="img/hamburger.png"></a>

    <nav id="topnav" class ="close">
      <ul>
        <li>
          <a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'aboutus.php') ? 'active' : NULL ?>" href="aboutus.php">About us</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'account.php') ? 'active' : NULL ?>" href="account.php">Account</a>
        </li>
        <li>
          <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
        </li>
      </ul>
    </nav>
    <script src="js.js"></script>
  </body>
</html>
