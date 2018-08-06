<?php require('../connection.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Managment</title>
<style type="text/css">
	label{font-size: 16px; color: brown !important; }
</style>
</head>

<body>

<div class="">
  <table width="597" border="1" cellpadding="5" cellspacing="2">
    <tbody>
      <tr>
       <th width="18" scope="col">ID</th>
        <th width="88" scope="col">User Name</th>
        <th width="65" scope="col">E-mail</th>
        <th width="66" scope="col">Status</th>
        <th width="96" scope="col">Your Choice</th>
      </tr>

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

	
$sql = "SELECT * FROM user ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo '<tr>
		<td>'.$row["id"].'</td>
	    <td>'.$row["username"].'</td>
        <td>'.$row["email"].'</td>
		<td>'.$row["status"].'</td>
		<td><a href="update_status.php?user_id='.$row["id"].'&status=approved">Approved</a> 
		<a href="update_status.php?user_id='.$row["id"].'&status=rejected">Rejected</a></td>
      </tr>';
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
	
?>
  </div>   
</body>
</html>