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


$sql = "SELECT Fname,Minit,Lname,Ssn,Email,Phone,Drive_Licence FROM customer";
$result = $conn->query($sql);
//echo "<br> begin ";

echo "<h3> Customer List</h3>";
if ($result->num_rows > 0) {
    // 输出每行数据
    //echo  "<table border="1">";
    echo "<table   border=1>";
    echo "<tr>";
    echo "<td>" ."Fname"."</td>"."<td>" ."Minit"."</td>"."<td>" ."Lname"."</td>"."<td>" ."Ssn"."</td>"."<td>" ."Email"."</td>"."<td>" ."Phone"."</td>"."<td>" ."Drive licence"."</td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["Fname"]. "</td>" ;
        echo "<td>".  $row["Minit"]."</td>";
        echo "<td>". $row["Lname"]. "</td>" ;
        echo "<td>".  $row["Ssn"]."</td>";
        echo "<td>". $row["Email"]. "</td>" ;
        echo "<td>".  $row["Phone"]."</td>";
        echo "<td>".  $row["Drive_Licence"]."</td>";
        echo "</tr>";
      }
    echo "</table>";
    //echo "</table>";
} else {
        echo "0 results";
      }
      $conn->close();


?>

<form action="customerinfo.php" method="post" >
<h3> Add customer info</h3>
customer Fname<br><input type="text" name="Fname"/><br><br>
customer Mint<br> <input type="text" name="Minit"/><br><br>
customer Lname<br> <input type="text" name="Lname"/><br><br>
customer Ssn<br><input type="text" name="Ssn"/><br><br>
customer Email<br><input type="text" name="Email"/><br><br>
customer Phone<br> <input type="text" name="phone"/><br><br>
customer Drive licence<br> <input type="text" name="licence"/><br><br>



<input type="submit" name="" value="Add Customer">
</form>



</body>
</html>
