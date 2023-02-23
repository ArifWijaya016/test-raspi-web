<h2>🛠️ Arduino IDE</h2>

<p>1. ubah SSID dan Password)</p>

```php
const char* ssid     = "YOUR SSID";
const char* password = "YOUR PASSWORD";
```
<p>1. isi ip untuk post data</p>

```php
const char* serverName = "http://YOUR IP /POST.php";
```

<p>1. buat API Key (mikon dan web harus sama)</p>

```php
String apiKeyValue = "YOUR_API_KEY";
```

<p>2. data yang akan di post ke server</p>

```php
String httpRequestData = ""
```

<p>3. status code</p>

``` php
if (httpResponseCode>0) 
{
  Serial.print("HTTP Response code: ");
  Serial.println(httpResponseCode);
}    
 else {
 Serial.print("Error code: ");
 Serial.println(httpResponseCode):     
}
```

<h2>🛠️ file PHP (connection.php)</h2>
<p>ubah bagian connection.php sesuai kebutuhan</p>

```php
$dbname = "YOUR DATABASE NAME";
$servername = "YOUR SERVERNAME";
$username = "YOUR USERNAME";
$password= "YOUR PASSWORD";
```

<p>PHP menggunakan PDO (PHP DATA OBJECT)</p>

```php
$pdo = "mysql:host=$servername; dbname=$dbname";
function saring($data){
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$connection = new PDO( "mysql:host=$servername;dbname=$dbname", 'YOUR USERNAME', 'YOUR PASSWORD');
	if(!$connection){
		die("Fatal Error: Connection Failed!");
	}
```

<p>PHP menggunakan MYSQLI</p>

```php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
```


<h2>🛠️ file PHP (post-data.php)</h2>
<p>code import connection.php</p>

```php
require "connection.php";
```
<p>code membuat api untuk validasi api dari arduino</p>

```php
$api_key_value = "YOUR API KEY";
```

<p>code membuat variabel untuk menampung sensor dari arduino</p>

```php
$api_key= $nama = $sensor_kelembaban=$sensor_n=$sensor_p=$sensor_k=$sensor_ph= "";
```

<p>code melakukan pengecekan dan  publish data ke database</p>

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = saring($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama = saring($_POST["nama"]);
        $sensor_kelembaban = saring($_POST["sensor_kelembaban"]);
        $sensor_n = saring($_POST["sensor_n"]);
        $sensor_p = saring($_POST["sensor_p"]);
        $sensor_k = saring($_POST["sensor_k"]);
        $sensor_ph = saring($_POST["sensor_ph"]);
        try{        
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO testing (nama, sensor_kelembaban,sensor_n,sensor_p,sensor_k, sensor_ph)VALUES ('" . $nama . "', '" . $sensor_kelembaban . "','" . $sensor_n . "','" . $sensor_p . "','" . $sensor_k . "','" . $sensor_ph . "')";
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
```
