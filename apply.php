
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
<!DOCTYPE HTML>
<html>
<head>
    <title>Learner a education bootstrap Website Template | Home :: w3layouts</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- start slider -->
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />

    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style1.css" />
    <script type="text/javascript">
        $(function() {

            $('#da-slider').cslider({
                autoplay : true,
                bgincrement : 450
            });

        });
    </script>
    <!-- Owl Carousel Assets -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <script src="js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {

            $("#owl-demo").owlCarousel({
                items : 4,
                lazyLoad : true,
                autoPlay : true,
                navigation : true,
                navigationText : ["", ""],
                rewindNav : false,
                scrollPerPage : false,
                pagination : false,
                paginationNumbers : false,
            });

        });
    </script>

    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
</head>
<body>
<div class="header_bg">
    <div class="container">
        <div class="row header">
            <div class="logo welcome navbar-left">
                <h1><a href="index.html">WELCOME TO ABDUS SALAM HALL </a></h1>
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row h_menu">
        <nav class="navbar navbar-default navbar-left" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
		        <li class="active"><a href="index.php">Home</a></li>
		        <li><a href="apply.php">Apply For Seat</a></li>
		        <li><a href="search.php">Query Info</a></li>
		        <li><a href="notice.php">Notice</a></li>
		      </ul>
            </div><!-- /.navbar-collapse -->
            <!-- start soc_icons -->
        </nav>
        <div class="soc_icons navbar-right">
            <ul class="list-unstyled text-center">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- start slider -->

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
                <option value="PHARMACY">PHARMACY</option>
                <option value="ICT">ICT</option>
                <option value="ECONOMICS">ECONOMICS</option>
                <option value="ACCE">ACCE</option>
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





<div class="footer_bg"><!-- start footer -->
    <div class="container">
        <div class="row  footer">
            <div class="copy text-center">
                <p class="link"><span>&#169; All rights reserved | Design by Me</span></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>