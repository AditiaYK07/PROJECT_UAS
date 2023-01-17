<?php session_start(); ?>
<?php include('db_con.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><style>
	  

	footer {
		clear:both;
	  background-color:#1d1d1d; 
	  padding:10px;
	  color:rgb(0, 0, 0);
	}
	</style>
</head>
<body>
<div id="container">
<div class="jumbotron jumbotron-fluid bg-light p-4">
		<div class="container">

</div>
<header>
    <h2 align="center">HALAMAN LOGIN</h2>
<div class="form-wrapper">
  <fieldset>
  <form action="#" method="post">
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  </fieldset>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($conn, $_POST['user']);
			$password = mysqli_real_escape_string($conn, $_POST['pass']);
			
			$query 	= mysqli_query($conn, "SELECT * FROM users WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Username dan Password anda salah';
				}
		}
  ?>
  <div class="reminder">
    <p>Not a member? <a href="#">Sign up now</a></p>
    <p><a href="#">Lupa Password</a></p>
  </div>
  
</div>

</body>
</html>