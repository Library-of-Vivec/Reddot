<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script
  src="https://apis.google.com/js/platform.js" async defer>
  </script>
  <script src="functions.js"></script>
  
  <style>
	body {
	  font-family: Arial, Helvetica, sans-serif;
	}

	.dropdown {
	  float: left;
	  overflow: hidden;
	}


	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  float: none;
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.dropdown-content a:hover {
	  background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
	  display: block;
	}
</style>
  </head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn" id="signin_"></div>
	<button onclick ="signOut()">Sign Out</button>
  <script>
	//// IF USER HASNT LOGGED IN VALIDATION in functions.js///
	check_login();
	//// IF USER HASNT REGISTERED VALIDATION in functions.js///
	check_reg();
	////GOOGLE SIGN BUTTON FUNCTION but hidden///////
	var x = document.getElementById("signin_");
	x.style.display = "none";
	function onSignIn(googleUser){
		var profile = googleUser.getBasicProfile()
	}
	//////////////////////////////////////////////
	
	////GOOGLE SIGN OUT BUTTON FUNCTION/////
	function signOut(){
		gapi.auth2.getAuthInstance().signOut().then(function(){
			console.log('user signed out')
		})
		document.cookie = "email=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
		document.cookie = "reg=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
		document.cookie = "setup=; expires=Thu, 01 Jan 1969 00:00:00 UTC; path=/;";
		location.replace("loginpage.php");
		
	} 
	///////////////////////////////////////////////
	
  </script>
    <!-- MENU TAB DROPDOWN-->
  <div class="navbar">
    <a href="landingpage.php">FEU COMMUNITY FORUM</a>
	<div class="dropdown">
	<button class="dropbtn">Menu Tabs 
	  <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-content">
        <a href="landingpage.php">Landing Page</a>
        <a href="forumpost.php">Forum Post</a>
        <a href="forumdisp.php">Forum Display</a>
      </div>
	</div> 
  </div>
  <!-- MENU TAB DROPDOWN-->
<?php
	include 'config.php';
	//DISPLAY USERNAME AND PROFILE PIC
    echo $_COOKIE["email"]."</br>";
	$email = $_COOKIE['email'];
	$username_sql = "SELECT username, profilepic from account WHERE email='".$email."'";
	$result1 = mysqli_query($conn, $username_sql);
	if(mysqli_num_rows($result1)>0){
	  	while($row = mysqli_fetch_assoc($result1)){
		echo "Username: ".$row["username"];
		echo "</br>Profile Pic: <img src=\"".$row["profilepic"]."\" height=50 width=50>";
	    }
	}
	//DISPLAY USERNAME AND PROFILE PIC


  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
	$email = $_COOKIE['email'];
    $sql = "INSERT INTO forums(title, post, email_user)
                        VALUES('$title', '$post', '$email')";
    $insert = mysqli_query($conn,$sql);
	echo $title."<br>";
	echo $post."<br>";
	echo $email."<br>";
    if($insert){
      echo "post success";
    }
    else{
      echo "Post could not be made.";
    }
  }

 ?>

<form action="" method="post">
  <input type="text" name="title" placeholder="Title here"></input><br>
  <textarea name="post" placeholder="Post here" rows="5" cols="100" style="resize:none"></textarea><br>
  <input type="submit" name="submit" value="Submit"></input>
</form>
</body>
</html>
