<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>

<?php 

if(!(isset($_REQUEST['bid'])&&isset($_REQUEST['rid'])) ){
	header("location: room-info.php");
}
else {
	$bid = $_REQUEST['bid'];
	$rid = $_REQUEST['rid'];
}	
?>


<?php
	
	if(isset($_POST['submit'])){
		
		try{
			if(empty($_POST['room'])) {
			throw new Exception("Room can not be empty.");
		}
			if(empty($_POST['block'])) {
			throw new Exception("Block can not be empty.");
		}
			if(empty($_POST['floor'])) {
			throw new Exception("Floor can not be empty.");
		}
			if(empty($_POST['in_date'])) {
			throw new Exception("In Date can not be empty.");
		}
			if(empty($_POST['out_date'])) {
			throw new Exception("Out Date can not be empty.");
		}
			if(empty($_POST['seat_id'])) {
			throw new Exception("Seat Id can not be empty.");
		}
		$seat_id = $_POST['seat_id'];	
		$statement = $db->prepare("SELECT seat_id,st_id FROM tbl_allot WHERE seat_id=?");
		$statement->execute(array($seat_id));
		$total = $statement->rowCount();
		
		if($total>0) {
			throw new Exception("Can not be alloted in this seat/Already alloted.");
		}
	
		$alloted = 1;
		
		
		$statement = $db->prepare("Insert into tbl_allot(room_no,block_no,floor_no,st_id,in_date,out_date,seat_id,alloted) values (?,?,?,?,?,?,?,?)"); 
			
		$statement->execute(array($_POST['room'],$_POST['block'],$_POST['floor'],$bid,$_POST['in_date'],$_POST['out_date'],$_POST['seat_id'],$alloted));
			
		$statement = $db->prepare("UPDATE tbl_student SET allot=? where st_id=?");
		$statement->execute(array($alloted,$bid));	
		
		$statement = $db->prepare("SELECT available_seat from tbl_roomentry where room_id=?");
		$statement->execute(array($rid));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row ) {
			
			$result1=$row['available_seat']-1;
		}
		$statement = $db->prepare("UPDATE tbl_roomentry SET available_seat=? where room_id=?");
		$statement->execute(array($result1,$rid));	
			
		
		
		
		$success_message = "Alloted successfully.";
		//header("location:check-info.php");
			
		}
		catch(Exception $e)
		{
			$error_message = $e->getMessage();
		}
	}

?>
<?php include('header.php')?>
<h2>Give Allotment</h2>
<?php
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>

<form action="" method="post">
	<table>

		<tr><th>Block Number</th>
			<td>
				<?php 
				
					$statement = $db->prepare("SELECT block_no FROM tbl_roomentry where room_id=?");
					$statement->execute(array($rid));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{
				
				?>
					<input type="text" value="<?php echo $row['block_no']?>" name="block" />
				<?php
					}
				?>
					
			</td>
			</tr>
			<tr><th>Floor Number</th>
			<td>
				<?php 
				
					$statement = $db->prepare("SELECT floor_no FROM tbl_roomentry where room_id=?");
					$statement->execute(array($rid));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{
				
				?>
					<input type="text" value="<?php echo $row['floor_no']?>" name="floor" />
				<?php
					}
				?>
					
			</td>
			</tr>
			<tr><th>Enter Room Number</th>
				<td>
				<?php 
				
					$statement = $db->prepare("SELECT room_no FROM tbl_roomentry where room_id=?");
					$statement->execute(array($rid));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{
				
				?>
					<input type="text" value="<?php echo $row['room_no']?>" name="room"/>
				<?php
					}
				?>
					
			</td>
			</tr>
			<tr><th>Enter In date Number</th>
			<td>
				<input type="text" name="in_date" /><td>
			</td>
			</tr>
			<tr><th>Enter Out date Number</th>
			<td>
				<input type="text" name="out_date" /><td>
			</td>
			</tr>
			<tr><th>Enter Seat Id</th>
			<td>
				<?php 
				
					$statement = $db->prepare("SELECT room_no,block_no,floor_no FROM tbl_roomentry where room_id=?");
					$statement->execute(array($rid));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{
				
				?>
					<?php
						$R = "R".$row['room_no'];
						$B = "B".$row['block_no'];
						$F = "F".$row['floor_no'];
						$room1 = $R.$B.$F."S1";
						$room2 = $R.$B.$F."S2";
						$room3 = $R.$B.$F."S3";
						$room4 = $R.$B.$F."S4";
					?>
					<select name="seat_id">
						<option value="<?php echo $room1; ?>"><?php echo $room1; ?></option>
						<option value="<?php echo $room2; ?>"><?php echo $room2; ?></option>
						<option value="<?php echo $room3; ?>"><?php echo $room3; ?></option>
						<option value="<?php echo $room4; ?>"><?php echo $room4; ?></option>
					</select>
					
				<?php
					}
				?>
					
			</td>
			</tr>
			<tr>
			<td>
				<input type="submit" name="submit" value="ALLOT"/>
			</td>
		</tr>
		
	</table>
</form>

<a href="check-info.php">Back To Allotment Check Page</a>
<?php include('footer.php'); ?>	