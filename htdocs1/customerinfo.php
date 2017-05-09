<html>
<body>
  <?php include("navigation.html") ?>
  <?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database_name = "Car_rental";
  // 创建连接
  $conn = mysqli_connect($servername, $username, $password,$database_name);

  // 检测连接
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //echo "Connected successfully";



$Fname=$_POST["Fname"];
$Minit=$_POST["Minit"];
$Lname=$_POST["Lname"];
$Ssn=$_POST["Ssn"];
$Email=$_POST["Email"];
$Phone=$_POST["phone"];
$licence=$_POST["licence"];

echo "$Fname,$Minit,$Lname,$Ssn,$Email,$Phone,$licence";


  $result="INSERT INTO customer(Ssn,Fname,Minit,Lname,Phone,Drive_Licence,Email)
  VALUES('$Ssn','$Fname','$Minit','$Lname','$Phone','$licence','$Email')";

  mysqli_query($conn,$result) or die(mysqli_error($conn));

	echo "<h3>customer information updated.</h3>";


?>

</body>
</html>
