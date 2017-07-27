<?php
ob_start();
session_start();
if(!isset($_SESSION["name"])){
	header("location:login.php");
}
include('../config.php');
?>

<?php
	
	if(isset($_POST['submit'])){
		
	try {
			if(empty($_POST['block_no'])) {
			throw new Exception("Block No can not be empty.");
		}
			if(empty($_POST['floor_no'])) {
			throw new Exception("Floor No can not be empty.");
		}
			
		}
		catch(Exception $e)
		{
			$error_message = $e->getMessage();
		}
	}

?>

<?php include('header.php')?>
<h2>Check Room</h2>
<?php
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>
	
<form action="room-info.php" method="post">
	<table class="tbl1">
		<tr>
			<td>Enter Block Number : </td>
			<td>
					<select name="block_no">
                                    	<!--<option value="">Select a Block</option>-->
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                    </select>
			</td>
		</tr>
		
		<tr>
			<td>Enter Floor Number : </td>
			<td>
				<select name="floor_no">
                                    	<!--<option value="">Select a Floor</option>-->
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                </select>
			</td>
		</tr>
		
		<tr>
			<td><input type="submit" value="CHECK" name="submit" /></td>
		</tr>
	</table>
	
</form>





<?php include('footer.php'); ?>	