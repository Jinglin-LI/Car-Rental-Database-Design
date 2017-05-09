<!DOCTYPE html>
<html>
  <head>

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
?>

<?php


$sql = "SELECT * FROM `car` WHERE 1";
$result = $conn->query($sql);
//echo "<br> begin ";

echo "<h3> Car List</h3>";
if ($result->num_rows > 0) {
    // 输出每行数据
    //echo  "<table border="1">";
    echo "<table border=1>";
    echo "<tr>";

    echo "<td>" ."VID"."</td>"."<td>" ."type"."</td>"."<td>" ."brand"."</td>"."<td>"
    ."capacity"."</td>"."<td>" ."detail"."</td>"."<td>" ."Status"."</td>"."<td>" ."Rental rate"."</td>"."<td>" ."Insurance". "</td>" . "<td>"."StoreID"."</td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["VID"]. "</td>" ;
        echo "<td>".  $row["type"]."</td>";
        echo "<td>". $row["brand"]. "</td>" ;
        echo "<td>".  $row["capacity"]."</td>";
        echo "<td>". $row["detail"]. "</td>" ;
        echo "<td>".  $row["Status"]."</td>";
        echo "<td>".  $row["Rental_rate"]."</td>";
        echo "<td>".  $row["Insurance"]."</td>";
        echo "<td>".  $row["StoreID"]."</td>";
        echo "</tr>";
      }
    echo "</table>";
    //echo "</table>";
} else {
        echo "0 results";
      }
      $conn->close();


?>






<form action="updateCar.php" method="post" >
<h3> Update Car infomation </h3>
<h5>-----------------</h5>
<h5> current Car VID :</h5>
VID<input type="text" name="vid"/><br><br>
<h5>-----------------</h5>
<h5> change this Car's information :</h5>
Type <input type="text" name="type"/><br><br>
Brand: <input type="text" name="brand"/><br><br>
capacity: <input type="text" name="capacity"/><br><br>
detail: <input type="text" name="detail"/><br><br>
Status: <select name = "status">
<option>In-Store</option>
<option>Out-Store</option>
</select><br><br>
Rental_rate:<input type="text" name="rental_rate"/><br><br>
Insurance:<input type="text" name="insurance"/><br><br>
StoreID:<input type="text" name="storeid"/><br><br>

<input type="submit" name="submit" value="update Car">
</form>



  <body>

  </body>
</html>
