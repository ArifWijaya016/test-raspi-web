<!-- UDAH DI TES DAN OK -->
<?php
require "connection.php";
// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "esp";

$api_key= $nama = $sensor= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = saring($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama = saring($_POST["nama"]);
	$sensor_kel = saring($_POST["sensor_kelembaban"]);
	$sensor_nit  =saring($_POST["sensor_nitrogen"]);
	$sensor_pho = saring($_POST["sensor_phospat"]);
	$sensor_kal = saring($_POST["sensor_kalium"]);
	$sensor_ph = saring($_POST["sensor_ph"]);

        //$sensor = saring($_POST["sensor"]);
        // Create connection
      
try{        
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO irsensor (nama,sensor_kel,sensor_nit,sensor_phos,sensor_kal,sensor_ph)VALUES ('" . $nama . "', '" . $sensor_kel . "',"'.$sensor_)";
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
