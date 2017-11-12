<?php

  include("config.php");
  include("header.php");

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

function add_comment($comment) {

	@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

	$comment= htmlentities($comment);
	$comment = mysqli_real_escape_string($db, $comment);

	$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
	$stmt = $db->prepare($query);
	$stmt->execute();
}

if (isset($_POST['username'])) {
    add_comment($_POST['username']);
}

if (isset($_POST['password'])) {
    add_comment($_POST['password']);
}

?>

<?php

if(isset($_POST['username'], $_POST['password'])) {
    $inputusername = stripslashes($_POST['username']);
    $inputuserpass = stripslashes($_POST['password']);

    @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

    $query = ("SELECT userid, username, userpass FROM users WHERE username = ?");
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $inputusername);
    $stmt->execute();
    $stmt->bind_result($userid, $username, $userpass);

    if (isset($_POST['rememberme'])) {
      $rememberme = $_POST['rememberme'];
    }

    while($stmt->fetch()){

    if($userpass == sha1($inputuserpass)) {
      $_SESSION['username'] = $inputusername;
       $_SESSION['userid'] = $userid;
         if ($rememberme = $_POST['rememberme']) {
          $cookie_name = 'username';
          $cookie_value = $inputusername;
          setcookie($cookie_name, $cookie_value, time()+86400);}
      header("refresh:0");

    } else {
      echo "<h3 id=\"wrongtext\">Wrong username or password!</h3>";
    }
}

}
?>

<html id="accounthtml">
  <head>

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <title>Creative Colony</title>
  </head>
  <body id="accountbody">
    <header>

    </header>
    <main id="accountmain">

      <?php

     if (!isset($_SESSION['username'])) {
       ?>

      <h2 id="accounth2">Account</h2>

      <form class="forms" action="" method="post">
        <?php $cookie_name = 'username';
         if (isset($_COOKIE[$cookie_name])) {
          echo '<input type="text" name="username" placeholder="username" value="';echo "$_COOKIE[$cookie_name]"; echo '">';
        }else {
          echo '<input type="text" name="username" placeholder="username" value=""> </input>';
        }
           ?>
        <input type="password" name="password" placeholder="password">
         <p id="remember">Remember username</p> <input id="checkbox" type="checkbox" name="rememberme"> <br><br><br>
        <input class="formsubmit" type="submit" name="login" value="Log in">
        <br>
        <a href="register.php">Don't have an account? Click me!</a>
      </form>

        <?php }elseif (isset($_SESSION['username'])) {
          $inputusername = ($_SESSION['username']);
          $userid = ($_SESSION['userid']);
          echo ("<h2 id=portfolioname>{$inputusername}´s Portfolio</h2>");

          ?>
          <div class="accountoptions">
            <div id="accountlinksfolder">
              <a class="accountlinks" href="description.php" >Edit your Portfolios description</a>
              <a class="accountlinks" href="upload.php">Expand your portfolio with more fantastic content</a>

              <?php
              @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

              $userid = $_SESSION['userid'];

              $sql = $db->prepare("SELECT public FROM images WHERE public = 1 AND userid = '{$userid}'");
              $sql->execute();
              $sql->store_result();

              $publicated = $sql->num_rows();

              if ($publicated == 0) {
                echo "<br><br><p class=publicprivate>Private</p>";
              }else {
                echo "<br><br><p class=publicprivate>Public</p>";
              } ?>

               <form class=""  method="POST">
                 <input type="submit" name="public" value="Change">
               </form>

              <?php

              @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

                  if(isset($_POST['public'])){
                    $userid = $_SESSION['userid'];

                    $query = ("SELECT public FROM images WHERE userid = '{$userid}'");
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $statement->store_result();
                    $statement = $db->prepare("UPDATE images SET public = !public WHERE userid = '{$userid}'; ");
                    $statement->execute();

                 }
               ?>

            </div>
          <div id="accountinformation">
            <h4 id="portfoliocreator">Creator: <?php echo "$inputusername"; ?></h4>
            <h4 id="portfoliodescription"> <?php

            @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

            $userid = ($_SESSION['userid']);

            $statement = $db->prepare("SELECT description FROM portfolio WHERE userid = '{$userid}'");
            $statement->execute();
            $statement->store_result();

            $totalcount = $statement->num_rows();

            $title = $inputusername."s Portfolio";
            $description = 'Please insert a brief description about you Portfolio!';

            if ($totalcount == 0) {
              $query = ("INSERT INTO portfolio(title, description, userid) VALUES ('{$title}', '{$description}', ?)");
              $stmt = $db->prepare($query);
              $stmt->bind_param('i', $userid);
              $stmt->execute();
              echo "$description";

            } elseif($totalcount != 0){
              $userid = ($_SESSION['userid']);
              $query = "SELECT description FROM portfolio WHERE userid = '{$userid}'";
              $statement = $db->prepare($query);
              $statement->bind_result($userdescription);
              $statement->execute();
              while ($statement->fetch()) {
                echo "$userdescription";
              }
            }

                ?>
                </h4>
                <?php
              }
              ?>

          </div>

          <div id="bigportfoliofolder">
          <?php


          @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

          if (isset($_SESSION['username'])) {
            $userid = ($_SESSION['userid']);
            $stmt = $db->prepare("SELECT imageid, title, description, link FROM images WHERE userid = '{$userid}'");
            $stmt->execute();
            $stmt->bind_result($imageid, $title, $description, $link);

          while ($stmt->fetch()) {?>
            <div class="portfolioimgfolders">
              <img class="portfolioimages" src="<?php echo $link; ?>" />
            <?php  echo '<a id="imagedeletelink" href="deleteimage.php?imageid=' . urlencode($imageid) . '"><img src="img/cross.png"></a> '; ?>
              <h3 class="imagetitle"><?php echo $title; ?></h3>
              <p class="imagedescription"><?php echo $description; ?></p>
            </div>
            <?php
          }
          }
          ?>
          </div>
        </div>
<!-- above code developed from https://stackoverflow.com/questions/15735450/images-as-links-in-mysql-database -->

    </main>
    <footer id="accountfooter">
      <a href="https://www.facebook.com/"><img src="img/fbicon.png" alt=""></a>
      <a href="https://www.instagram.com/"><img src="img/igicon.png" alt=""></a>
      <a href="https://www.youtube.com/"><img src="img/youtubeicon.png" alt=""></a>
      <a href="https://www.twitter.com/"><img src="img/twittericon.png" alt=""></a>
      <a href="mailto:example@gmail.com?"><img src="img/mailicon.png" alt=""></a>
      <p>© 2017 CREATIVECOLONY.COM ALL RIGHTS RESERVED</p>
    </footer>
  </body>
</html>
