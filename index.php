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
    $sql = "SELECT ID, Password FROM people WHERE Username='".$Username."'"; 
    $result = $conn->query($sql);
    $HashedPassword=$result->fetch_object()->Password;
    $result = $conn->query($sql);
    $UserLoggedIn=$result->fetch_object()->ID;

      if (password_verify($Password, $HashedPassword)) {
        $_SESSION["UserLoggedIn"]=$UserLoggedIn;
        header('Location: ./Status.php');
      }
      else {
        echo "Either the password or username is WRONG!";
      }

  }

?>

</body>
</html>