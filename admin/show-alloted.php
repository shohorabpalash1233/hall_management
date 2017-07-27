<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php include('header.php')?>
<h2>Alloted Students</h2>

<table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="10%">Student Name</th>
		<th width="15%">Room_no</th>
		<th width="15%">Block_no</th>
		<th width="10%">Floor_no</th>
		<th width="10%">In_date</th>
		<th width="10%">Out_date</th>
		<th width="5%">Seat_Id</th>
		<th width="5%">Action</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_allot join tbl_student where tbl_allot.st_id=tbl_student.st_id and alloted=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['st_name']; ?></td>
			<td><?php echo $row['room_no']; ?></td>
			<td><?php echo $row['block_no']; ?></td>
			<td><?php echo $row['floor_no']; ?></td>
			<td><?php echo $row['in_date']; ?></td>
			<td><?php echo $row['out_date']; ?></td>
			<td><?php echo $row['seat_id']; ?></td>
			<td><a href="view-details.php?id=<?php echo $row['st_id']; ?>">View Details</a></td>
		</tr>
		<?php
	}
	?>
	
</table>

<?php include('footer.php'); ?>	