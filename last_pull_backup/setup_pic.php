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
	///IF USER HASN't REGISTERED YET in functions.js/////
	check_reg();
  </script>

    <form action="" enctype="multipart/form-data" method="post">
		Set a Profile Picture:
		<input type="file" name="file">
		<input type="submit" value="Upload" name="upload"> <br/>
	</form>
	<?php
	//UPDATE PROFILE PICTURE IN profilepics using temp_profilepics
    $email = $_COOKIE["email"];
	$pos = strpos($email,"@");
	$id = substr($email, 0, $pos);
	echo $email;
	echo $id;
	copy("default.png", "temp_profilepics/".$id.".png");
	if(isset($_POST['upload']))
	{ 
	  $filepath = "temp_profilepics/" . $_FILES["file"]["name"];
	  if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
	  {
		rename($filepath, "temp_profilepics/".$id.".png");
		echo "<img src=\"temp_profilepics/".$id.".png\" height=150 width=150 />";
		echo "<form action=\"setup_pic_confirm.php\" method=\"post\">
      <input type=\"submit\" value=\"Save\" name=\"save\" id=\"btnsave\"> <br/>
		</form>";
	  } 
	  else 
	  {
	    echo "Error !!";
	  }
	}
	else{
	}
	?>



  </body>
 </html>