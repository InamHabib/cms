<?php

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {

   if (isset($_POST['title'], $_POST['content'])) {
   	
   	$title= $_POST['title'];
    $content= nl2br($_POST['content']);

    if (empty($title) or empty($content)) {

    	$error='All feilds required';
    	# code...
    }
    else{

    	$query=$pdo->prepare("INSERT into articles (article_title, article_content, article_timestamp) values(?, ?, ?)");
    	$query->bindValue(1, $title);
    	$query->bindValue(2, $content);
    	$query->bindValue(3, time());
    	$query->execute();
    	
    	header('location:index.php');
    }


   }



	?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Inam</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="container">


      
      <form action="add.php" method="post" autocomplete="off">
      	<input type="text" name="title" placeholder="Title">
      	
      	<textarea rows="15" cols="50" placeholder="content" name="content"></textarea>
      	<input type="submit" value="Add Article">

      </form>

   
    

    </div>
</body>
</html>

	<?php }

else
{
	header('location: index.php');
}



?>