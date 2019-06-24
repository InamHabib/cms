<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article= new Article;

if(isset($_GET['id'])){

	//display article

	$id=$_GET['id'];
	$data=$article->fetch_data($id);
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inam</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="container">
      
      <h4><?php echo $data['article_title']; ?> <small><?php echo date('l, jS', $data['article_timestamp']); ?></small></h4>
      <p><?php echo $data['article_content'];?> </p>
      <a href="index.php">&larr; back</a>

   
    

    </div>
</body>
</html>


<?php }
else
{
	header('location:index.php');
    exit();
}


?>
