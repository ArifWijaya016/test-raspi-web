<?php
require "connection.php";
$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'admin', 'raspberry');
if(!$connection){
	die("Fatal Error: Connection Failed!");
}

$api_key_value = "esp";

$api_key= $nama = $sensor_kelembaban=$sensor_n=$sensor_p=$sensor_k=$sensor_ph= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = saring($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama = saring($_POST["nama"]);
        $sensor_kelembaban = saring($_POST["sensor_kelembaban"]);
        $sensor_n = saring($_POST["sensor_n"]);
        $sensor_p = saring($_POST["sensor_p"]);
        $sensor_k = saring($_POST["sensor_k"]);
        $sensor_ph = saring($_POST["sensor_ph"]);
    
        // Create connection
      
try{        
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO server_data (nama, sensor_kelembaban,sensor_n,sensor_p,sensor_k, sensor_ph)VALUES ('" . $nama . "', '" . $sensor_kelembaban . "','" . $sensor_n . "','" . $sensor_p . "','" . $sensor_k . "','" . $sensor_ph . "')";
			$connection->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$connection = null;
    
        $connection->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}
?>
