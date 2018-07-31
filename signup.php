<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign Up Page</title>
</head>

<body>

	<form id="form1" name="form1" method="post">
		<p>
		  <label for="textfield">Username:</label>
		  <input type="text" name="username" id="username">
	  </p>
		<p>
		  <label for="email">Email:</label>
		  <input type="email" name="email" id="email">
	  </p>
		<p>
		  <label for="password">Password:</label>
		  <input type="password" name="password" id="password">
	  </p>
	  <input type="submit" name="submit" id="submit" value="Submit">
	</form>
	<p><a href="index.php">Go back to the index page:</a></p>
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO user (username, email, password) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
	
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	exit;
}

$conn->close();
?>

	
</body>
</html>