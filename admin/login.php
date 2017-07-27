<?php

if(isset($_POST['form_login'])) 
{
	
	try {
	
		
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
		
		$username = $_POST['username'];
			
		$password = $_POST['password']; // admin
		$password = md5($password);
	
	
		include('../config.php');
		$num=0;
		
		$statement = $db->prepare("select * from tbl_login where username=? and password=?");
		$result = $statement->execute(array($username,$password));		
		
		$num = $statement->rowCount();
		
		if($num>0) 
		{
			if($username == $username && $password == $password){
				session_start();
				$_SESSION['name'] = $username;
				header("location: index.php");
			}
			
		}
		else
		{
			throw new Exception('Invalid Username and/or password');
		}

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
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style1.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            <section>				
                <div id="container_demo" >
                   
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        	<?php
								if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
							?>
                            <form  action="" method="post" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username or email"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                             
                                <p class="login button"> 
                                    <input type="submit" value="LOGIN" name="form_login"/> 
								</p>
                                <p class="change_link">
									Add New Admin?
									<a href="register.php" class="to_register">Register</a>
								</p>
                            </form>
                        </div>

                        
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>