<!DOCTYPE  HTML>
<html>
	<head>
		<title>Dashboard - Sample blog with PHP</title>
		<link type="text/css" rel="stylesheet" href="../style-admin1.css" />
		<script type='text/javascript'>
		function confirmDelete()
		{
			return confirm("Are you sure that you want to delete this data?");
		}
		</script>
		
		<!-- Fancybox jQuery -->
		<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
		<script type="text/javascript" src="../fancybox/main.js"></script>
		<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
		<!-- //Fancybox jQuery -->
		
		<!-- CKEditor Start -->
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<!-- // CKEditor End -->
	
	</head>
	
	<body>
		
		<div id="wrapper">
			<div id="header">
				<h1>Admin Panel Dashboard</h1>
				</div>
				
				<div id="container">
					<div id="sidebar">
						<h2>Admin Options</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="change-password.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
						
						<h2>Student Approval</h2>
						<ul>
							<li><a href="approve.php">Approve</a></li>
						</ul>
						<ul>
							<li><a href="approved-students.php">Approved Students</a></li>
						</ul>
						<h2>Allotment Process</h2>
						<ul>
							<li><a href="check-info.php">Give Allotment</a></li>
						</ul>
						<ul>
							<li><a href="show-alloted.php">Alloted Students</a></li>
						</ul>
						<ul>
							<li><a href="all-room.php">View All Room</a></li>
						</ul>
						
					</div>
					<div id="content">