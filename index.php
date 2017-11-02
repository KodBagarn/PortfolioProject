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
        <form id="searchform" action="" method="">
          <h2 id="exploreh2">EXPLORE</h2>
          <input type="text" name="" value="">
        </form>

        <a href="#" onmouseover="toggleClassInfo();" onmouseout="toggleClassInfo();">
          <img id="questionbutton" src="img/questionmark.png" alt="">
        </a>

        <div id="infotext" class="closed">
  				<p>You can search for #TAGS, users or portfolios</p>
        </div>



        <img id="placeholderimg" src="img/placeholderimg.jpg" alt="">
        <img id="placeholderimg" src="img/pl2.jpg" alt="">
        <img id="placeholderimg" src="img/pl3.jpg" alt="">
        <img id="placeholderimg" src="img/pl4.jpg" alt="">
        <img id="placeholderimg" src="img/pl5.jpg" alt="">
        <img id="placeholderimg" src="img/placeholderimg.jpg" alt="">
        <img id="placeholderimg" src="img/placeholderimg.jpg" alt="">
        <img id="placeholderimg" src="img/placeholderimg.jpg" alt="">
        <img id="placeholderimg" src="img/placeholderimg.jpg" alt="">
        <br>
        <a id="loadlink" href="#">Load more...</a>
      </div>
      <script type="text/javascript" src="js.js"></script>
    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>
