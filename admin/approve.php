<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>

<?php 
if(isset($_REQUEST['id'])){
			try{
				$statement = $db->prepare("UPDATE tbl_student SET approve=1 where st_id=?");
				$statement->execute(array($_REQUEST['id']));
		
				$success_message = "Student is approved.";
			
		}
		catch(Exception $e){
			$error_message = $e->getMessage();
		}
}	
?>

<?php include('header.php')?>
<h2>Pending Student's for approval</h2>
<?php
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>

<?php
	$statement = $db->prepare("SELECT * FROM tbl_student where approve=0");
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
	$statement = $db->prepare("SELECT * FROM tbl_student where approve=0");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if(empty($result))
	{
		echo "There are no pending studnets";
	}else{
		
	}
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
			<td><a href="approve.php?id=<?php echo $row['st_id']; ?>">Approve</a></td>
		</tr>
		<?php
		
	}
	
	?>
</table>
		<?php
	}?>



<?php include('footer.php'); ?>	