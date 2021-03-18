<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer> </script>
  <script src="functions.js"></script>
  <link rel="stylesheet" type="text/css" href="regstyle.css"/>
  </head>
  <body>
  <script>
	//// IF USER HASNT LOGGED IN VALIDATION///
	check_login();
	//// IF USER WAS ALREADY REGISTERED AND SETUP IS COMPLETE VALIDATION///
	check_reg_setup();
  </script>
  <?php
    $email = $_COOKIE["email"];
	$pos = strpos($email,"@");
	$id = substr($email, 0, $pos);
	include 'config.php';
	//INSERT AND INITIALIZE VALUES
	if(isset($_POST['next']))
	{
	  //temp_profilepics = pang store lang ng temp na pic nadedelete din after
	  //profilepics = official folder ng profile pic

	  //GET DEFAULT PICTURE
	  //RENAMING DEFAULT PICTURE TO STUDENT ID IN PROFILEPICS
	  copy("default.png", "temp_profilepics/".$id.".png");
      copy("temp_profilepics/".$id.".png", "profilepics/".$id.".png");

      $username = $_POST['username'];
	  $summary = $_POST['summary'];
	  $summary = htmlspecialchars($summary, ENT_QUOTES);
	  $profilepic = "profilepics/".$id.".png";
	  $insert_sql = "INSERT INTO account(username,email, summary, profilepic)
                      VALUES('$username', '$email', '$summary', '$profilepic')";
      $insert = mysqli_query($conn,$insert_sql);
	  if($insert){
	    echo "default register success";
		setcookie("reg", "yes");
		setcookie("setup", "notcomplete");
		$folder_path = "temp_profilepics";
		$files = glob($folder_path.'/*');
		// Deleting all the files in the temp_profilepics
		foreach($files as $file) {
		  if(is_file($file))
				unlink($file);
		}
	    echo "<script>location.replace(\"setup_pic.php\")</script>";
	  }
	  else{
        echo "Username already exists!";
	  }

	}
  ?>
  <div class = "boxcontainer">
  <div = "dispdiv">
    <form action="registration.php" method="post" enctype="multipart/form-data" id="forms">
	  <label for="username">Username</label>
	  <input type="text" class = "textareas" name="username" placeholder="Enter your username here..." autocomplete="off" required>
	  <br>
	  <label for="summary">Summary: </label>
	  <textarea name="summary" class = "textareas" rows="3" cols="40" placeholder="Enter your summary here..."></textarea>
	  <br>
      <input class = "submitpost" type="submit" name="next" value="Next">
	</form>
</div>
</div>
  </body>
 </html>
