<?php

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) 
{?>
   //display index
	<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div class="container">
	 <a href="../index.php" id="logo">Home</a>

	 <br>

	 <ol>
	 	<li><a href="add.php">Add Article</a></li>
	 	<li><a href="delete.php">Delete Article</a></li>
	 	<li><a href="logout.php">Log Out</a></li>
	 </ol>
	 

    </div>
</body>
</html>


<?php }

else
{
	if(isset($_POST['username'], $_POST['password'])){

		$username= $_POST['username'];
		$password= $_POST['password'];

		if(empty($username) or empty($password))
		{
			$error='All feilds are Required!';
		}

		else{

			$query= $pdo->prepare("SELECT * from users WHERE user_name= ? AND user_password= ?");
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);
			$query->execute();
			$num= $query->rowCount();

			if($num == 1)
			{
				
				$_SESSION['logged_in']=true;
			}
			else
			{
				$error='user enterd incorrect details';
			}
		}
	}
	//display login
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div class="container">
	 <a href="../index.php" id="logo">Home</a>
	 <?php if(isset($error)){?>
     <small style="color: red" >
	 <?php echo $error;  } ?>
	</small>
       <form action="index.php" method="post" autocomplete="off">
       	<input type="text" name="username" placeholder="Username">
       	<input type="password" name="password" placeholder="Password">

       	<input type="submit" value="Login"/>
       </form>
   

    </div>
</body>
</html>

<?php }


?>