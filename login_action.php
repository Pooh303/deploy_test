<?php
	session_cache_limiter('private, must-revalidate');
	session_cache_expire(60);
	ob_start();
	session_start();
	$_SESSION = array();
	session_destroy(); 
?>
<?php require_once('connect.php'); ?>
<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	date_default_timezone_set('Asia/Bangkok');
	$datetime = date('Y-m-d H:i:s');
?>

<?php
	
	if($password != ""){

			
		$sql = "SELECT * FROM Member WHERE Username = '".$username."' AND Password = '".$password."'";	
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			
			
				while($row = mysqli_fetch_assoc($result)) {			
                    
					//Redirect
					if($username == 'test')
						echo "<script> window.open('index.php','_self'); </script>";
					else
						echo "<script> window.open('index.php','_self'); </script>";
					
				}
				
		}
        else{
				echo "<script> alert('Wrong Username or Password !'); </script>";
				echo "<script> window.open('login.php','_self'); </script>";
				exit(0);
		}
	
	} else {
			//not login sucess
			echo "<script> alert('Wrong Username or Password !'); </script>";
			echo "<script> window.open('login.php','_self'); </script>";
			exit(0);
		}
			
	
?>