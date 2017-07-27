<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php include('header.php')?>
<h2>All rooms</h2>

<table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="15%">Room_no</th>
		<th width="15%">Block_no</th>
		<th width="10%">Floor_no</th>
		<th width="5%">Available Seat</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_roomentry");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			
			<td><?php echo $row['room_no']; ?></td>
			<td><?php echo $row['block_no']; ?></td>
			<td><?php echo $row['floor_no']; ?></td>
			<td><?php echo $row['available_seat']; ?></td>
		</tr>
		<?php
	}
	?>
	
</table>

<?php include('footer.php'); ?>	