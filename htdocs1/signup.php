<html>
<body>
<?php include("navigation.html") ?>

<?php
	$database_host = "localhost";
	$database_user = "root";
	$database_pass = "root";
	$database_name = "Car_rental";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

$Email=$_POST["email"];
$Password=$_POST["password"];



	$result="INSERT INTO account(Email,Password)
	VALUES('$Email','$Password')";
	mysqli_query($connection,$result) or die(mysqli_error($connection));
	echo "<h3>YOU ARE A MEMEMBER NOW!!</h3>";


?>

</body>
</html>
