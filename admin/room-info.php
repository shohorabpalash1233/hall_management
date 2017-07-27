<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>
<?php
	if(empty($_POST['block_no'])&&empty($_POST['floor_no'])){
		header("location:check-info.php");
	}else{
		$block = $_POST['block_no'];
		$floor = $_POST['floor_no'];
	}
	
?>
<?php include('header.php')?>
<h2>View Room Info</h2>


<table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="65%">Room Number</th>
		<th width="30%">Available Seat</th>
		<th width="30%">Action</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM tbl_roomentry where block_no = $block and floor_no = $floor ");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$avail = $row['available_seat'];
		if($avail==0)
		{
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['room_no']; ?></td>
				<td><?php echo $row['available_seat']; ?></td>
				<td>Full</td>
			</tr>
			<?php
		}else{
			
		
		$i++;
		?>
		
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['room_no']; ?></td>
		<td><?php echo $row['available_seat']; ?></td>
		<td><a href="show-pending.php?rid=<?php echo $row['room_id']?>">Allot</a></td>
	</tr>
		<?php
	}}
	?>
	
	
	
	
</table>
<?php include('footer.php'); ?>	