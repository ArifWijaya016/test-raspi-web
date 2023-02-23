<?php 
require_once "connection.php";
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data data.xls");

  $mysqli = new mysqli($servername, $username, $password, $dbname);
// // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$data = mysqli_query($mysqli,"SELECT * from server_data");
$datas = array();
while( $rows = mysqli_fetch_assoc($data) ) {
  $datas[] = $rows;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta http-equiv="refresh" content="<?php echo $timer?>;URL='<?php echo $page?>'">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testing Output</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>

  <div class="container">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">nama</th>
      <th scope="col">kelembaban</th>
      <th scope="col">sensor N</th>
      <th scope="col">sensor P</th>
      <th scope="col">sensor K</th>
      <th scope="col">PH</th>
          <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($datas as $row):?>
 <tr>
<td><?php echo $row ['nama']?></td>
<td><?php echo $row ['sensor_kelembaban']?></td>
<td><?php echo $row ['sensor_n']?></td>
<td><?php echo $row ['sensor_p']?></td>
<td><?php echo $row ['sensor_k']?></td>
<td><?php echo $row ['sensor_ph']?></td>
<td><?php echo $row ['timestamp']?></td>
</tr>
<?php endforeach; ?>
</tbody>
        </table>
    </div>
</body>
</html>
