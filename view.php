
<?php
include('config.php');
	if(empty($_POST['name'])){
		header("location:search.php");
	}else{
		$block = $_POST['name'];
	}
	
?>

	<!DOCTYPE html>
<html lang="en">
<head>
  <title>View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

															

<div class="container">
  <h2>Serach Results</h2>
  
          
  
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Room Number</th>
        <th>Block No</th>
        <th>Floor No</th>
        <th>In Date</th>
        <th>Out Date</th>
        <th>Seat ID</th>
      </tr>
    </thead>
    <?php
  $statement = $db->prepare("SELECT * from tbl_student natural join tbl_allot where st_name = ? or room_no = ? ");
  $statement->execute(array($_POST['name'],$_POST['name']));
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  $num = $statement->rowCount();
  foreach($result as $row)
  {
    ?>

    <tbody>
      <tr class="success">
        <td><?php echo $row['st_name']; ?></td>
        <td><?php echo $row['room_no']; ?></td>
        <td><?php echo $row['block_no']; ?></td>
        <td><?php echo $row['floor_no']; ?></td>
        <td><?php echo $row['in_date']; ?></td>
        <td><?php echo $row['out_date']; ?></td>
        <td><?php echo $row['seat_id']; ?></td>
      </tr>        
      <?php
  }
  ?>
     
    </tbody>

  </table>
  		
	<a href="search.php"><button type="button" class="btn btn-success">Back</button></a>
</div>

</body>
</html>	
