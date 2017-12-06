<?php
ob_start();
session_start();
$servername = "localhost";
$username = "Admin";
$password = "OTxByTmpERZQlAFh";
$dbname = "names";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
</head>
<body style="background-color: #E3E5E5">
	<h1>Register User</h1>
	<!-- Gather information -->
	<form method="post">
		Username:
		<input type="text" name="user">
		Password:
		<input type="text" name="pass">
		Age:
		<input type="text" name="age">
		<br><br>
		<input type="submit" name="Register" value="Register">
	</form>

<?php
if (isset($_POST['Register'])) {
  $Username=$_POST['user'];
  $Password=$_POST['pass'];
  $Age=$_POST['age'];
  $Username=mysqli_real_escape_string($conn, $Username);
  $Password=mysqli_real_escape_string($conn, $Password);
  $Age=mysqli_real_escape_string($conn, $Age);
  mysqli_query($conn,"INSERT INTO people (Username, Age, Password) VALUES ('".$Username."','".$Age."','".$Password."')");
  }
  ?>

</body>
</html>