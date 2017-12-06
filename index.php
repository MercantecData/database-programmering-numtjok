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
	<title>Login</title>
</head>
<body style="background-color: #E3E5E5">
	<!-- Login forms -->
  <h1>Login</h1>
	<form method="post">
  Username:<br>
  <input type="text" name="user">
  <br>
  Password:<br>
  <input type="password" name="pass">
  <br><br>
  <input type="submit" name="LoggedIn" value="Login">
<a href="Register_User.php">Register<a/>




</form> 
  <!-- Login Check -->
<?php 
if (isset($_POST['LoggedIn'])) {
  $Username=$_POST['user'];
  $Password=$_POST['pass'];
  $Username=mysqli_real_escape_string($conn, $Username);
  $Password=mysqli_real_escape_string($conn, $Password);
	$sql = "SELECT Username, Password FROM people WHERE Username='".$Username."' AND Password='".$Password."'";
  $result = $conn->query($sql);

    if ($result->num_rows >0) {
      header('Location: ./Success.html');
    }
    else {
      echo "Either the password or username is WRONG!";
          }

}

?>

</body>
</html>