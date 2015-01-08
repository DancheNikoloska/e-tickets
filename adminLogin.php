 <?php
  include_once 'delete_reservations.php';
session_start();
$error='';
//logiranje na administrator
//prvo mora da provereme dali nekoj e veke najaven, ako e prenasocuvame
if (isset($_SESSION['adminname'])) {
	
	$flag = 1;
} else {
	$flag = 0;
	}
//ako e najaven korisnik
if (isset($_SESSION['username']))
{
	header("Location: homeUser.php");
}
//inaku ne e najaven i proveruvame dali bilo klinato submit na formata
if (isset($_POST['submit'])) {
	include_once 'database.php';
	include_once 'user_validation.php';
	$user = $_POST['username'];
	$pass = $_POST['password'];
	

	if (validateLoginAdmin($link, $pass, $user) == true) {
		//ovde doagjame ako ne bil prethodno najaven i e kliknato submit, i go najavuvame samo so toa so piseme u $_SESSION koj e najaven
		$_SESSION['adminname'] = $userAdmin;
		$q = mysqli_query($link, "SELECT * FROM users WHERE username='$userAdmin'");
		if ($q) {
			$row = mysqli_fetch_assoc($q);
			$_SESSION['userAdmin_id']=$row["id"];
			$_SESSION["type"]="admin";
			
			header('Location: homeAdmin.php');
			
		} else {
			echo "error so baza";
		}
	} else {
		
		$error='<span style=float:right;color:red>Невалидни податоци!&nbsp </span>';
		
	}
}
?>

    
    <!DOCTYPE html>
    <html>
    	<body>
    		<head>
    			<meta charset="UTF-8">
    			 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    		</head>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" style="border: 1px solid #428bca;" >
                    <div class="panel-heading" style="background-color: #428bca;">
                        <div class="panel-title" style="color: white">Најавете се</div>
                        <div style="float:right;  font-size: 80%; position: relative; top:-10px"><a href="#">Ја заборавивте вашата лозинка?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" action="" method="post" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="корисничко име">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="лозинка">
                                    </div>
                                    

                                <span><?php echo $error; ?></span><br>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls pull-right">
                                    	<input name="submit" type="submit" value="Најава" id="btn-login" class="btn btn-success" />       
                                    </div>
                                </div>


                              
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    </div>
    </body>
    </html>