<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer> </script>
  <script src="functions.js"></script>
  </head>
  <body>
  <script>
	//// IF USER HASNT LOGGED IN VALIDATION in functions.js///
	check_login();
	
	//// IF USER WAS ALREADY REGISTERED AND SETUP IS COMPLETE VALIDATION in functions.js///
	check_reg_setup();
	////IF USER ISN"T REGISTERED VALIDATION///
	check_reg();
  </script>
	<?php
    $email = $_COOKIE["email"];
	$pos = strpos($email,"@");
	$id = substr($email, 0, $pos);
	echo "Click the button to complete setup";
	if(isset($_POST['save']))
	{
	  copy("temp_profilepics/".$id.".png", "profilepics/".$id.".png");
	  $folder_path = "temp_profilepics"; 
	  $files = glob($folder_path.'/*');  
		// Deleting all the files in the temp_profilepics
		foreach($files as $file) { 
		  if(is_file($file))  
				unlink($file);  
		} 
	}
	if(isset($_POST['home'])){
	  setcookie("setup", "complete");
	  echo "<script>location.replace(\"landingpage.php\")</script>";
	}
	?>
	<form action="registration3.php" method="post">
      <input type="submit" value="GoToHome" name="home"> <br/>
    </form>




  </body>
 </html>