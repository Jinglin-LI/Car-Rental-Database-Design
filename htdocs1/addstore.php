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




$StoreID=$_POST["StoreID"];
$Phone=$_POST["Phone"];
$Operating_time=$_POST["Operating_time"];
$Street=$_POST["Street"];
$City=$_POST["City"];
$State=$_POST["State"];
$Zip=$_POST["Zip"];
$R_ssn=$_POST["R_ssn"];

echo "$Fname,$Minit,$Lname,$Ssn,$Email,$Phone,$licence";


  $result="INSERT INTO `store`(`StoreID`, `Phone`, `Operating_time`, `Street`, `City`, `State`, `Zip`, `R_ssn`)
  VALUES('$StoreID','$Phone','$Operating_time','$Street','$City','$State','$Zip','$R_ssn')";

  mysqli_query($conn,$result) or die(mysqli_error($conn));

	echo "<h3>customer information updated.</h3>";


?>

</body>
</html>
