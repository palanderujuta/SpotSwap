<?php
$user_name = $_REQUEST["username"];
$location = $_REQUEST["location"];

$servername = "mpss.csce.uark.edu";
$username = "crowdsource";
$password = "crowdsource123~";
$dbname = "SpotSwapDB";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *
FROM Posts
WHERE username!='". $user_name. "' and location='". $location. "' and reservedto=''
ORDER BY time DESC";
$result = $conn->query($sql);

echo $result->num_rows. "\n";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo $row["_id"]. "~". $row["username"]. "~". $row["location"]. "~". $row["floor"]. "~". $row["numseats"]. "~". $row["description"]. "~". $row["windowseat"]. "~".
		$row["poweroutlet"]. "~". $row["pc"]. "~". $row["whiteboard"]. "~". $row["maccomputers"]. "~". $row["rockingchair"]. "~". $row["silence"]. "\n"; 
	}
} 

$conn->close();
?>