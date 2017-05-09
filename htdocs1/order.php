<!DOCTYPE html>
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
?>

<?php


$sql = "SELECT * FROM `order_place` WHERE 1";
$result = $conn->query($sql);
//echo "<br> begin ";

echo "<h3> Customer List</h3>";
if ($result->num_rows > 0) {
    // 输出每行数据
    //echo  "<table border="1">";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td>" ."OrderID"."</td>"."<td>" ."Start_day"."</td>"."<td>" ."End_day"."</td>"."<td>" ."Start_mile"."</td>".
    "<td>" ."End_mile"."</td>"."<td>" ."Payment_way"."</td>"."<td>" ."Ssn"."</td>"."<td>" ."VID"."</td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["OrderID"]. "</td>" ;
        echo "<td>".  $row["Start_day"]."</td>";
        echo "<td>". $row["End_day"]. "</td>" ;
        echo "<td>".  $row["Start_mile"]."</td>";
        echo "<td>". $row["End_mile"]. "</td>" ;
        echo "<td>".  $row["Payment_way"]."</td>";
        echo "<td>".  $row["Ssn"]."</td>";
        echo "<td>".  $row["VID"]."</td>";
        echo "</tr>";
      }
    echo "</table>";
    //echo "</table>";
} else {
        echo "0 results";
      }
      $conn->close();


?>

<form action="orderdelete.php" method="post" >
<h3> Order Delete</h3>
OrderID<br><input type="text" name="OrderID"/><br><br>

<input type="submit" name="" value="Delete order">
</form>



</body>
</html>
