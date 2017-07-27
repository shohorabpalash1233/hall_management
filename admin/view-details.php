<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php

if(!isset($_REQUEST['id'])) {
	header("location: give-allotment.php");
}
else {
	$id = $_REQUEST['id'];
}
?>
<?php include('header.php')?>
</table>
	
	<h2>View Alloted Students Information</h2>

	
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_student where st_id=?");
	$statement->execute(array($id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
			<p>Name          : <?php echo $row['st_name']; ?></p>
			<p>Father's Name : <?php echo $row['st_father']; ?></p>
			<p>Mother's Name : <?php echo $row['st_mother']; ?></p>
			<p>Address       : <?php echo $row['st_address']; ?></p>
			<p>Phone         : <?php echo $row['st_phone']; ?></p>
			<p>Email         : <?php echo $row['st_email']; ?></p>
			<p>Department    : <?php echo $row['st_dept']; ?></p>
			<p>Session       : <?php echo $row['st_session']; ?></p>	
			<p>Roll No       : <?php echo $row['st_roll']; ?></p>
			<p>Blood Group   : <?php echo $row['st_blood']; ?></p>												
		<?php
	}
	?>
	
	
	<h2>View Room Information</h2>

	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_allot where st_id=?");
	$statement->execute(array($id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
			<p>Room No  : <?php echo $row['room_no']; ?></p>
			<p>Block No : <?php echo $row['block_no']; ?></p>
			<p>Floor No : <?php echo $row['floor_no']; ?></p>
			<p>In Date  : <?php echo $row['in_date']; ?></p>
			<p>Out Date : <?php echo $row['out_date']; ?></p>
			<p>Seat ID  : <?php echo $row['seat_id']; ?></p>
															
		<?php
	}
	?>
	<p><a href="show-alloted.php"><input type="button" value="Back" /></a></p>
<?php include('footer.php')?>