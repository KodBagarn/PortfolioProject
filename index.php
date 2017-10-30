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
      <div id="publicgalleries">
        <form id="searchform" action="" method="">
          <h2 id="exploreh2">EXPLORE</h2>
          <input type="text" name="" value="" placeholder="Search for #TAGS, USERS or PORTFOLIOS...">
        </form>
        <img id="questionmark" src="img/questionmark.png" alt="">
      </div>
    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
