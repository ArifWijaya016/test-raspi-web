<?php 
require_once "connection.php";

 $mysqli = new mysqli($servername, $username, $password, $dbname);
// // // Check connection
if ($mysqli->connect_error) {
     die("Connection failed: " . $mysqli->connect_error);
 } 

// Creating the connection by specifying the connection details
$connection = mysqli_connect($servername, $username, $password, $dbname);

//delete all records
$query = "TRUNCATE table testing";


if (mysqli_multi_query($connection, $query)) {
  echo "Clear Data Successfull";
  sleep(3);
   header("output.php");

} else {
  echo "Error:" . mysqli_error($connection);
}
//close the connection
mysqli_close($connection);

?>
