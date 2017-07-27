<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>

<?php include('header.php')?>
	
	<h2>Approved Students</h2>

<table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="10%">Name</th>
		<th width="15%">Father's Name</th>
		<th width="15%">Mother's Name</th>
		<th width="10%">Address</th>
		<th width="10%">Phone</th>
		<th width="10%">Email</th>
		<th width="5%">Department</th>
		<th width="5%">Session</th>
		<th width="5%">Roll</th>
		<th width="5%">Blood group</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_student where approve=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['st_name']; ?></td>
			<td><?php echo $row['st_father']; ?></td>
			<td><?php echo $row['st_mother']; ?></td>
			<td><?php echo $row['st_address']; ?></td>
			<td><?php echo $row['st_phone']; ?></td>
			<td><?php echo $row['st_email']; ?></td>
			<td><?php echo $row['st_dept']; ?></td>
			<td><?php echo $row['st_session']; ?></td>
			<td><?php echo $row['st_roll']; ?></td>
			<td><?php echo $row['st_blood']; ?></td>
		</tr>
		<?php
	}
	?>
	
</table>

<?php include('footer.php'); ?>	