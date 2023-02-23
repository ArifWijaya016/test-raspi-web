<?php
$dbname = "server";
$servername = "localhost";
$username = "admin";
$password= "raspberry";

// Start using PDO
//$pdo = "mysql:host=$servername; dbname=$dbname";

function saring($data){
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}



// Start using MYSQLI 
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }


// $connection = new PDO($pdo, $username, $password);
// $connection-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
