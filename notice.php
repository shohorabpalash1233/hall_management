<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>All Alloted Students</h2>
 
  <table class="table">
    <thead>
      <tr>
        <th >Serial</th>
		<th >Student Name</th>
		<th >Room_no</th>
		<th >Block_no</th>
		<th >Floor_no</th>
		<th >In_date</th>
		<th >Out_date</th>
		<th >Seat_Id</th>
      </tr>
    </thead>
    <tbody>
    	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_allot join tbl_student where tbl_allot.st_id=tbl_student.st_id and alloted=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
      <tr class="success">
      	<td><?php echo $i; ?></td>
        <td><?php echo $row['st_name']; ?></td>
        <td><?php echo $row['room_no']; ?></td>
        <td><?php echo $row['block_no']; ?></td>
        <td><?php echo $row['floor_no']; ?></td>
        <td><?php echo $row['in_date']; ?></td>
        <td> <?php echo $row['out_date']; ?></td>
        <td><?php echo $row['seat_id']; ?></td>
      </tr>
      
      <?php
	}
	?>
      
    </tbody>
  </table>
  <a href="index.php"><button type="button" class="btn btn-success">Back To Home</button></a>
</div>

</body>
</html>



