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


$sql = "SELECT * FROM `store` WHERE 1";
$result = $conn->query($sql);


echo "<h3> Store List</h3>";
if ($result->num_rows > 0) {
    // 输出每行数据
    //echo  "<table border="1">";
    echo "<table border=1>";
    echo "<tr>";

    echo "<td>" ."StoreID"."</td>"."<td>" ."Phone"."</td>"."<td>" ."Operating_time"."</td>"."<td>" ."Street"."</td>"."<td>"
    ."City"."</td>"."<td>" ."State"."</td>"."<td>" ."Zip"."</td>"."<td>" ."R_ssn"."</td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["StoreID"]. "</td>" ;
        echo "<td>".  $row["Phone"]."</td>";
        echo "<td>". $row["Operating_time"]. "</td>" ;
        echo "<td>".  $row["Street"]."</td>";
        echo "<td>". $row["City"]. "</td>" ;
        echo "<td>".  $row["State"]."</td>";
        echo "<td>".  $row["Zip"]."</td>";
        echo "<td>".  $row["R_ssn"]."</td>";

        echo "</tr>";
      }
    echo "</table>";
    //echo "</table>";
} else {
        echo "0 results";
      }


echo "<h3> Store  Represent List</h3>";



?>
<?php
$sql2 = "SELECT * FROM `store_representative` WHERE 1";
$result2 = $conn->query($sql2);

//echo "<br> begin ";
if ($result2->num_rows > 0) {
    // 输出每行数据
    //echo  "<table border="1">";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td>" ."R_ssn"."</td>"."<td>" ."Phone"."</td>"."<td>" ."Email"."</td>"."<td>" ."Working_time"."</td>";
    echo "</tr>";
    while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["R_ssn"]. "</td>" ;
        echo "<td>". $row["Phone"]."</td>";
        echo "<td>". $row["Email"]. "</td>" ;
        echo "<td>". $row["Working_time"]."</td>";


        echo "</tr>";
      }
    echo "</table>";
    //echo "</table>";
}else {
        echo "0 results";
      }
      $conn->close();

 ?>




<form action="addstore.php" method="post" >
<h3> Add Store </h3>
<h5>-----------------</h5>
<h5>Please assign Represent from Represent List above</h5>
Represent Ssn: <input name = "R_ssn"><br><br>
<h5>-----------------</h5>
StoreID:<input type="text" name="StoreID"/><br><br>
Phone :<input type="text" name="Phone"/><br><br>
Operating_time: <input type="text" name="Operating_time"/><br><br>
Street: <input type="text" name="Street"/><br><br>
City: <input type="text" name="City"/><br><br>
State: <input name = "State"><br><br>
Zip: <input type="text" name="Zip"/><br><br>



<input type="submit" name="submit" value="Add Store">
</form>



  <body>

  </body>
</html>
