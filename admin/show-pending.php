<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php

if(!isset($_REQUEST['rid'])) {
	header("location: room-info.php");
}
else {
	$rid = $_REQUEST['rid'];
}
?>
<?php include('header.php')?>
</table>
	
	<h2>Pending Students for Allotment</h2>
	
	<?php
	$statement = $db->prepare("SELECT * FROM tbl_student where approve=1 and allot=0");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if(empty($result))
	{
		echo "There are no pending studnets";
	}else{
		?>

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
		<th width="5%">Action</th>
	</tr>
	
	<?php
	
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_student where approve=1 and allot=0");
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
			<td><a href="allot.php?bid=<?php echo $row['st_id']; ?>&rid=<?php echo $rid; ?>">Allot</a></td>
		</tr>
		<?php
	}
	}?>

</table>
<p><a href="check-info.php"><input type="button" value="Back To Allotment Page" /></a></p>

<?php include('footer.php'); ?>	