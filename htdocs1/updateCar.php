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



$VID=$_POST["vid"];
$type=$_POST["type"];
$brand=$_POST["brand"];
$capacity=$_POST["capacity"];
$detail=$_POST["detail"];
$Status=$_POST["status"];
$Rental_rate=$_POST["rental_rate"];
$Insurance=$_POST["insurance"];
$StoreID=$_POST["storeid"];




  $result="UPDATE `car` SET `type`='$type',`brand`='$brand',`capacity`='$capacity',`detail`='$detail',
  `Status`='$Status',`Rental_rate`='$Rental_rate',`Insurance`='$Insurance',`StoreID`='$StoreID' WHERE VID = '$VID'";



  mysqli_query($conn,$result) or die(mysqli_error($conn));

	echo "<h3>Car information updated.</h3>";


?>

</body>
</html>
