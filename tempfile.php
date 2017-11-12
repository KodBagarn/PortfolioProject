


<!-- ACCOUNT.PHP SOM FUNGERAR MEN UTAN USERID -->


<?php

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment) {

	@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

	#here we add the html entities and string escaping
	$comment= htmlentities($comment);
	$comment = mysqli_real_escape_string($db, $comment);


	#<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
	#try the iframe after you add the "htmlentities"

	$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
	$stmt = $db->prepare($query);
	$stmt->execute();
}

#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

// function get_comment() {
//
// 	@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');
//
// 	$query = ("SELECT comment FROM comments");
// 	$stmt = $db->prepare($query);
// 	$stmt->bind_result($result);
// 	$stmt->execute();
//
//     while ($stmt->fetch()) {
//         echo $result;
//         echo "<hr/>";
//     }
// }
//
// #here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['username'])) {
    add_comment($_POST['username']);
}

if (isset($_POST['password'])) {
    add_comment($_POST['password']);
}

#here we call all comments to be shown by simply calling the get_comment function
//get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
?>

<?php

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if(isset($_POST['username'], $_POST['password'])) {
    $inputusername = htmlentities($_POST['username']);
    $inputuserpass = sha1($_POST['password']);

    $query = ("SELECT userid, username, userpass FROM users WHERE username ='$inputusername' AND userpass= '$inputuserpass'");
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();

    $totalcount = $stmt->num_rows();
}
?>




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

      <?php
       if(isset($totalcount)) {
         if($totalcount == 0) {
             echo "<h3 id=\"wrongtext\">Wrong username or password!</h3>";
         } elseif($totalcount != 0) {
             $_SESSION['username'] = $inputusername;
             //echo "<h3 id=\"welcometext\">Welcome $inputusername!</h3>";

         }
       }
     //   if(isset($_SESSION['username'])){
     //   $inputusername = $_SESSION['username'];
     //   $stmt=$db->prepare("SELECT userid FROM users WHERE username ='$inputusername' AND userid =(?)");
     //   $stmt->bind_param('i', $userid);
     //   $stmt->execute();
     //   echo "$inputusername";
     //   echo "$userid";
     // }


     if (!isset($_SESSION['username'])) {
       ?>


      <h2>Account</h2>

      <form class="forms" action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input class="formsubmit" type="submit" name="login" value="Log in">
        <br>
        <a href="register.php">Don't have an account? Click me!</a>
      </form>

        <?php }elseif (isset($_SESSION['username'])) {
          $inputusername = ($_SESSION['username']);
          echo ("<h2>{$inputusername}´s Portfolio</h2>");

          ?>
        <a id="uploadlink" href="upload.php" > Expand your portfolio with more fantastic content</a>
      <?php
        }
      ?>




 <!-- visa log in form om inte inloggad, ta bort när inloggad, file upload, form för namn, tags och beskrivning av bilden, val att göra portfolion public eller secret. kunna uppdatera bilder och ta bort dem -->

    </main>
    <?php
     include("footer.php");
    ?>
  </body>
</html>








<!-- UPLOAD.PHP WHEN TAGS ARE INCLUDED -->

<?php

session_start();

//CHECK YOUR CONNECTION TO THE DATABASE

@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

//UPLOAD IMAGES

if(isset($_FILES['upload'])){

    $allowedextensions = array('jpeg', 'png', 'jpg');
    $extension = strtolower(substr($_FILES['upload']['name'], strpos($_FILES['upload']['name'], '.') +1));

    $error = array();

    if(in_array($extension, $allowedextensions) === false) {
        $error[] = "<p id=errortextone>This file does not have an allowed extension</p>";
    }

    if($_FILES['upload']['size']>10000000) {
        $error[] = "<p id=errortexttwo>Your file is too big</p>";
    }

    if(empty($error)) {

        $filename = $_FILES['upload']['name'];

        $newfilename =$_SESSION['userid']."_".$filename;
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$newfilename}");
    } else {

    }
    }

//ADD NEW TAGS
@ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$gettags = "SELECT * FROM tags";

$stmt = $db->prepare($gettags);
$stmt->bind_result($tagid, $tag);
$stmt->execute();
if (isset($_POST['addtag'])) {

  @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');


$newtag = $_POST['tag'];


// $addtag = "INSERT INTO tags(tag) VALUES(?);";
//
// $stmt = $db->prepare($addtag);
// $stmt->bind_param('s', $newtag);
// $stmt->execute();
//
//header("location:upload.php");

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
  </head>
  <body id="uploadbody">
    <main id="uploadmain">

      <form id="uploadform" action="" method="post" enctype="multipart/form-data">

        <p>Upload an image</p>
        <br><br>
        <input id="uploadbutton" type="file" name="upload" value="">
        <input required id="uploadtitle" type="text" name="title" placeholder="Title">
        <textarea required id="descriptionfield" name="description" placeholder="Description" rows="4"></textarea>

        <br>
        <p id="choosetagsp">Choose one or several tags</p>
        <br><br>
        <p id="optionalp">(optional)</p>
        <br>


          <?php
          @ $db = new mysqli('localhost', 'root', '', 'portfoliodb');

          $displaytagsquery ="SELECT tag FROM tags";
          $result = $db->query($displaytagsquery);

          if ($result->num_rows > 0) { ?>
            <select id="tagselection" name="tag">
              <?php while ($row = $result->fetch_assoc()) {
                echo "<option>" . $row["tag"].  "</option>";
              }
              $db->close();                                                               //Line 98-106 was to large parts adapted from this example https://www.w3schools.com/php/showphpfile.asp?filename=demo_db_select_oo_table

          }

          ?>

        </select>
        <?php //echo "$newtag"; ?>

        <br>
        <button id="addTagSubmit" for="addtag" name="addtag" value="﹢Add tag">Add tag +</button>
        <br>
        <input id="uploadsubmit" type="submit" name="upload" value="Upload">

      </form>

      <?php

      if(isset($error)) {
          if(empty($error)) {
              echo '<a id="uploadlinkone" href="uploadedfiles/'.$newfilename.'">YOUR UPLOADED FILE';
              echo "</br>";
              echo '<a id="uploadlinktwo" href="gallerypage.php">Go to your portfolio</a>';
          } else {
              foreach ($error as $err) {
              echo $err;
              echo '</br>';
              }
          }
      }

      ?>

    </main>
  </body>
</html>






<!-- FOREACH GREJS -->

$q = $db->query("SELECT title, description, link FROM images WHERE userid = '{$userid}'");
while($r = $q->fetch_array(MYSQLI_ASSOC)):


foreach($r as $value) {
    echo '<div>';
    echo '<h3>' . $value . '</h3>';
    echo '<p>' . $value . '</p>';
    echo '<img>' . $value . '</img>';
    echo '</div>';
}
endwhile;






$stmt = $db->prepare("SELECT title, description, link FROM images WHERE userid = '{$userid}'");
$stmt->execute();
$stmt->bind_result($title, $description, $link);
$stmt->fetch();

?>
<br><br>
<img class="portfolioimages" src="<?php echo $link; ?>" />
<h3 class="imagetitle"><?php echo $title; ?></h3>
<p class="imagedescription"><?php echo $description; ?></p>



<!-- PART OF AJAX SEARCH FUNCTION -->


<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "searchusers.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(img/LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});
//To select country name
function selectUser(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>




<!-- SEARCH FOR IMAGES -->

<?php

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$stmt = $db->prepare("SELECT title, description, link FROM images");
$stmt->execute();
$stmt->bind_result($title, $description, $link);
while ($stmt->fetch()) {?>
  <br><br>
  <div class="imagefolder">
    <img class="portfolioimages" src="<?php echo $link; ?>" />
    <h3 class="imagetitle"><?php echo $title; ?></h3>
    <p class="imagedescription"><?php echo $description; ?></p>
  </div>
<?php  }

?>







<?php

$searchimages = "";

if (isset($_POST) && !empty($_POST)) {
    $searchimages = trim($_POST['searchimages']);
}

$searchimages = addslashes($searchimages);

@ $db = new mysqli('localhost', 'root', 'root', 'portfoliodb');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$query = ("SELECT title, description, link, public FROM images WHERE public = NULL");
if ($searchimages) {
    $query = $query . " and title like '%" . $searchimages . "%'";
}

  $stmt = $db->prepare($query);
  $stmt->bind_result($title);
  $stmt->execute();

  while ($stmt->fetch()) {?>
    <br><br>
    <div class="imagefolder">
      <img class="portfolioimages" src="<?php echo $link; ?>" />
      <h3 class="imagetitle"><?php echo $title; ?></h3>
      <p class="imagedescription"><?php echo $description; ?></p>
    </div>
  <?php  }

  ?>
