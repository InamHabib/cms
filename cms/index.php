
<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article= new Article();
$articles=$article->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inam</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="container">
        <a href="index.php" id="logo">Home</a>
    <ol>
    	<?php foreach($articles as $article) { ?>
    	<li>
    	<a href="article.php?id=<?php echo $article['article_id'];?>">
    	<?php echo $article['article_title']; ?>	
    	</a>
    	-<small>
    		posted <?php echo  date('l jS', $article['article_timestamp']); ?>
    	</small>
    	
        </li> <?php } ?>
    </ol>

    <a href="admin/index.php">Admin</a>

    </div>
</body>
</html>


