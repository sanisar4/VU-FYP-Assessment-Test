<?php require('connection.php'); ?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign Up Page</title>
</head>

<body>
<?php
if(!empty($_POST))
{
	// check empty post values and dispaly error 
	
	// check username already exist if yes then show error 
	// other wise insert user data
	$sql = "SELECT username FROM user WHERE username = '" . $_POST[ 'username' ] . "' ";
	$result = $conn->query($sql); // database query
	if ($conn->error) echo 'Error: '.$conn->error; // DB query handler
	else if ($result->num_rows >= 1) echo "Error: Please change username";
	else{
		$sql = "INSERT INTO user (username, email, password) VALUES ('" . $_POST[ 'username' ] . "', '" . $_POST[ 'email' ] . "', '" . $_POST[ 'password' ] . "')";

		if ( $conn->query( $sql ) === TRUE ) {
			//$last_id = $conn->insert_id;
			echo "Your data has been saved. Please wait for admin approval.";
		} else{
			echo "Error: " . $conn->error . "<br>";
		}
	}
	$conn->close();
}	
?>
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

</body>
</html>