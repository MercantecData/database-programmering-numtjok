<?php
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
	<title>Status</title>
</head>
<body style="background-color: #E3E5E5">

	<form method="post">
		New Status Update:
		<input type="text" name="Status_Update">
		<input type="submit" name="Post_Status" value="Post Status Update">
	</form>
	

	<?php
	$User=$_SESSION["UserLoggedIn"];

	if(isset($_POST['Post_Status'])) {
		$Status_Update=$_POST['Status_Update'];
		$Status_Update=mysqli_escape_string($conn, $Status_Update);
		$User=mysqli_escape_string($conn, $User);

		mysqli_query($conn,"INSERT INTO statusupdate (PostID, StatusUpdate) VALUES('".$User."','".$Status_Update."')");

	}

	

	?>


</body>
</html>