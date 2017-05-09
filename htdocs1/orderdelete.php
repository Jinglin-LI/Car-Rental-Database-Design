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


$OrderID=$_POST["OrderID"];





  $result="DELETE FROM `order_place` WHERE OrderID = $OrderID";



  mysqli_query($conn,$result) or die(mysqli_error($conn));

	echo "<h3>Order already deleted!!.</h3>";


?>

</body>
</html>
