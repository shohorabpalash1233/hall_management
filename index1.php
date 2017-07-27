<?php
	if(isset($_POST['form_apply'])){
		try{
			if(empty($_POST['name'])) {
				throw new Exception('Name can not be empty');
			}else if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
  				throw new Exception('Name is not valid');
			}
			if(empty($_POST['father'])) {
				throw new Exception('Father name can not be empty');
			}else if (!preg_match("/^[a-zA-Z ]*$/",$_POST['father'])) {
  				throw new Exception('Father Name is not valid');
			}
			if(empty($_POST['mother'])) {
				throw new Exception('Mother name can not be empty');
			}else if (!preg_match("/^[a-zA-Z ]*$/",$_POST['mother'])) {
  				throw new Exception('Mother Name is not valid');
			}
			if(empty($_POST['address'])) {
				throw new Exception('Address can not be empty');
			}
			if(empty($_POST['phone'])) {
				throw new Exception('Phone number can not be empty');
			}
			if(empty($_POST['email'])) {
				throw new Exception('Email can not be empty');
			}
			if(empty($_POST['department'])) {
				throw new Exception('Department can not be empty');
			}
			if(empty($_POST['session'])) {
				throw new Exception('Session can not be empty');
			}
			if(empty($_POST['roll'])) {
				throw new Exception('Roll Number can not be empty');
			}
			if(empty($_POST['blood'])) {
				throw new Exception('Blood group can not be empty');
			}
			
			
			include('config.php');
			
			$approve = 0;
			$allot = 0;
			
			$statement = $db->prepare("INSERT INTO tbl_student (st_name,st_father,st_mother,st_address,st_phone,st_email,st_dept,st_session,st_roll,st_blood,approve,allot) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$statement->execute(array($_POST['name'],$_POST['father'],$_POST['mother'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['department'],$_POST['session'],$_POST['roll'],$_POST['blood'],$approve,$allot));
						
			
			
			
			
			
			
		}
		catch(Exception $e) {
			$error_message = $e->getMessage();
		}
	}

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		
		<script>
			function myFunction() {
			    alert("Your infromation has been inserted successfully, Please wait untill we contact you..");
}
</script>
    </head>
    <body>
        <div class="container">
            
            <section>				
                <div id="container_demo" >
                    
                    <div id="wrapper">
<?php
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>

                        <div class="animate form">
                            <form  action="" method="post" autocomplete="on"> 
                                <h1> APPLY FOR SEAT </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Name</label>
                                    <input id="usernamesignup" name="name" required="required" type="text" placeholder="Name" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Father's Name</label>
                                    <input id="usernamesignup" name="father" required="required" type="text" placeholder="Father's Name" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Mother's Name</label>
                                    <input id="usernamesignup" name="mother" required="required" type="text" placeholder="Mother's Name" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Address</label>
                                    <input id="usernamesignup" name="address" required="required" type="text" placeholder="Address" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Phone</label>
                                    <input id="usernamesignup" name="phone" required="required" type="tel" placeholder="Phone" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Email</label>
                                    <input id="usernamesignup" name="email" required="required" type="email" placeholder="Email" />
                                </p>
								<p> 
                                    <label for="" class="uname" data-icon="">Department</label>
                                  
                                </p>
                                <p>
                                	<select name="department">
                                    	<option value="">Select a Department</option>
                                    	<option value="CSTE">CSTE</option>
                                    	<option value="FIMS">FIMS</option>
                                    	<option value="cste">CSTE</option>
                                    	<option value="cste">CSTE</option>
                                    	<option value="cste">CSTE</option>
                                    	<option value="cste">CSTE</option>
                                    </select>
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Session</label>
                                    <input id="usernamesignup" name="session" required="required" type="text" placeholder="Session" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Roll Number</label>
                                    <input id="usernamesignup" name="roll" required="required" type="text" placeholder="Roll Number" />
                                </p>
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Blood Group</label>
                                    <input id="usernamesignup" name="blood" required="required" type="text" placeholder="Blood Group" />
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up" name="form_apply" onclick="myFunction()"/> 
								</p>
                               
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>