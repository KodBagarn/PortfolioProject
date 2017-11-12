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

    <main id="indexmain">
      <div id="publicgalleries">
        <form id="searchform" action="index.php" method="POST">
          <h2 id="exploreh2">EXPLORE</h2>
          <input type="text" name="searchimages" value="">
          <input id="mainsearchbutton" type="submit" name="mainsearchbutton" value="Go">
          <a href="#" onmouseover="toggleClassInfo();" onmouseout="toggleClassInfo();">
            <img id="questionbutton" src="img/questionmark.png" alt="">
          </a>
        </form>

        <div id="publicimages">

          <?php

          @ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

          if ($db->connect_error) {
              echo "could not connect: " . $db->connect_error;
              printf("<br><a href=index.php>Return to home page </a>");
              exit();
          }

          function add_comment($comment) {

          	@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

          	$comment= htmlentities($comment);
          	$comment = mysqli_real_escape_string($db, $comment);

          	$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
          	$stmt = $db->prepare($query);
          	$stmt->execute();
          }

          if (isset($_POST['searchimages'])) {
              add_comment($_POST['searchimages']);
          }

          if (isset($_POST['searchimages'])) {
            $usersearch = $_POST['searchimages'];

            $stmt = $db->prepare("SELECT title, description, link FROM images
                WHERE public = '1' AND (title LIKE '%{$usersearch}%' OR description LIKE '%{$usersearch}%')");
            $stmt->execute();
            $stmt->bind_result($title, $description, $link);
            while ($stmt->fetch()) {?>
              <br><br>
              <div class="portfolioimgfolders">
                <img src="<?php echo $link; ?>" />
                <h3 class="imagetitle"><?php echo $title; ?></h3>
                <p class="imagedescription"><?php echo $description; ?></p>
              </div>
            <?php
            }
          }else {
            $stmt = $db->prepare("SELECT title, description, link FROM images WHERE public = '1'");
            $stmt->execute();
            $stmt->bind_result($title, $description, $link);
            while ($stmt->fetch()) {?>
              <br><br>
              <div class="portfolioimgfolders">
                <img src="<?php echo $link; ?>" />
                <h3 class="imagetitle"><?php echo $title; ?></h3>
                <p class="imagedescription"><?php echo $description; ?></p>
              </div>
              <?php
              }
            }
              ?>

            <div id="infotext" class="closed">
      				<p>Search for images here</p>
            </div>

          <br>
        </div>
      </div>
      <script type="text/javascript" src="js.js"></script>
    </main>
    <?php
     include("footer.php");
    ?>

  </body>
</html>
