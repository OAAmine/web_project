<style>
	form {
		margin: 20px 30% 20px 30%;
	}



	h1 {
		text-align: center;
	}

	input[type=text],
	input[type=password],
	textarea,
	select {
		padding: 10px;
		width: 100%;
		font-size: 17px;
		font-family: Raleway;
		border: 1px solid #aaaaaa;
	}

	input[type=submit] {
		background-color: #191970;
		color: #ffffff;
		border: none;
		padding: 10px 20px;
		font-size: 17px;
		font-family: Raleway;
		cursor: pointer;
		margin-top: 15px;
	}

	input[type=submit]:hover {
		opacity: 0.8;
	}
</style>


<?php

require_once 'db.php';

session_start();

if (isset($_SESSION["nom_d_utilisateur"]))	//check condition user login not direct back to index.php page
{
	header("location: index.php");
}

if (isset($_REQUEST['btn_login']))	//button name is "btn_login" 
{
	$nom_d_utilisateur	= strip_tags($_REQUEST["txt_nom_d_utilisateur_email"]);	//textbox name "txt_username_email"
	$email		= strip_tags($_REQUEST["txt_nom_d_utilisateur_email"]);	//textbox name "txt_username_email"
	$password	= strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"




	if (empty($nom_d_utilisateur)) {
		$errorMsg[] = "please enter username or email";	//check "username/email" textbox not empty 
	} else if (empty($email)) {
		$errorMsg[] = "please enter username or email";	//check "username/email" textbox not empty 
	} else if (empty($password)) {
		$errorMsg[] = "please enter password";	//check "passowrd" textbox not empty 
	} else {
		try {
			$select_stmt = $db->prepare("SELECT * FROM chercheurs WHERE nom_d_utilisateur=:uname OR email=:uemail"); //sql select query
			$select_stmt->execute(array(':uname' => $nom_d_utilisateur, ':uemail' => $email));	//execute query with bind parameter
			$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if ($nom_d_utilisateur == $row["nom_d_utilisateur"] or $email == $row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
					if (password_verify($password, $row["mot_de_passe"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["nom_d_utilisateur"] = $row["nom_d_utilisateur"];	//session name is "user_login"
						$_SESSION["id"] = $row["id"];
						$loginMsg = "Successfully Login...";		//user login success message

						header("refresh:2; index.php");			//refresh 2 second after redirect to "welcome.php" page
					} else {
						$errorMsg[] = "wrong password";
					}
				} else {
					$errorMsg[] = "wrong username or email";
				}
			} else {
				$errorMsg[] = "wrong username or email";
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Login and Register Script using PHP PDO with MySQL : onlyxcodes.com</title>

	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<link rel="stylesheet" href="all.css">



</head>

<body>

	<?php include("navbar.php"); ?>



	<?php
	if (isset($errorMsg)) {
		foreach ($errorMsg as $error) {
	?>
			<div class="alert alert-danger">
				<strong><?php echo $error; ?></strong>
			</div>
		<?php
		}
	}
	if (isset($loginMsg)) {
		?>
		<div class="alert alert-success">
			<strong><?php echo $loginMsg; ?></strong>
		</div>
	<?php
	}
	?>
	<center>
		<h2>Login Page</h2>
	</center>
	<form method="post" class="form-horizontal">

		<div class="form-group">
			<label class="col-sm-3 control-label">Username or Email</label>
			<div class="col-sm-6">
				<input type="text" name="txt_nom_d_utilisateur_email" class="form-control" placeholder="enter username or email" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Password</label>
			<div class="col-sm-6">
				<input type="password" name="txt_password" class="form-control" placeholder="enter passowrd" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" name="btn_login" class="btn btn-success" value="Login">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9 m-t-15">
				You don't have a account register here? <a href="register.php">
					<p class="text-info">Register Account</p>
				</a>
			</div>
		</div>

	</form>


	<?php
	include("footer.php");

	?>
</body>

</html>