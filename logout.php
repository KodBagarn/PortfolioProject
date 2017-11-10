<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
    <?php  include('header.php'); ?>
    </header>
    <main>
      <h2>Thanks for your visit, See you soon!</h2>
    </main>
      <?php include('footer.php'); ?>
  </body>
</html>
