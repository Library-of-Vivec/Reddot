<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script
  src="https://apis.google.com/js/platform.js" async defer>
  </script>
  <script src="functions.js"></script>

  <style>
  @keyframes growDown {
  0% {
    transform: scaleY(0)
  }
  80% {
    transform: scaleY(1.1)
  }
  100% {
    transform: scaleY(1)
  }
}
	body {
	  font-family: Arial, Helvetica, sans-serif;
	}

	.dropdown {
	  float: left;
	  overflow: hidden;
	}
  .dropbtn{
    width:177px;
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
    transition-duration: 0.5s;
	  float: none;
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.dropdown-content a:hover {
    transition-duration: 0.5s;
	  background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
    animation: growDown 500ms ease-in-out forwards;
    transform-origin: top center;
	  display: block;
	}
  .navbar{
    border-color:black;
    border-style: solid;
    text-align: right;
  }
  button{
    transition-duration: 0.5s;
    background-color:grey;
    border-style: none;
    padding: 15px 32px;
  }
  button:hover{
    transition-duration: 0.5s;
    background-color:white;
    border-style: none;
    padding: 15px 32px;
  }
  .sign_out{
    float: right;
  }
</style>
  </head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn" id="signin_"></div>
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
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.disconnect();
		document.cookie = "email=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
		document.cookie = "reg=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
		document.cookie = "setup=; expires=Thu, 01 Jan 1969 00:00:00 UTC; path=/;";
		location.replace("loginpage.php");

	}
	///////////////////////////////////////////////

  </script>
    <!-- MENU TAB DROPDOWN-->
  <div class="navbar">
    <button onclick ="signOut()" class="sign_out">Sign Out</button>
	<div class="dropdown">
	<button class="dropbtn">Menu Tabs
	  <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-content">
      <a href="landingpage.php">Home</a>
      <a href="forumtest.php">Create Post</a>
      <a href="forumdisp.php">See Posts</a>
  <a href="display_all.php">See all Helpful Posts</a>
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
  echo "</div>";
	//DISPLAY USERNAME AND PROFILE PIC

  $sql = "SELECT title, email_user, post, id FROM forum";
  $result = mysqli_query($conn, $sql);
  if($email == "201811471@feualabang.edu.ph" || $email == "201810285@feualabang.edu.ph" || $email == "201811597@feualabang.edu.ph" || $email == "201811285@feualabang.edu.ph"){
    echo "admin page<br>";
    echo "<form action = '' method = 'post'>";
    while($row = mysqli_fetch_assoc($result)){
		echo "<div class=\"posts\">";
		$value = $row["id"];
        echo "<input type = 'checkbox' name = 'checkdelete[]' value = \"".$row["title"]."\"><a href='forumpost.php?post_id=$value'>".$row["title"]."</input></a><br>";
		if(strlen($row["post"]) > 198){
			echo "<p>".substr($row["post"], 0,198)."...</p>";
		}
		else{
			echo "<p>".$row["post"]."</p>";
		}
		echo "<p>posted by: ".$row["email_user"]."</p></div>";

    }
    echo "<input type='submit' name = 'delsub' value = 'Delete'>";
    echo "</form>";
  }
  else{
    echo "user page <br>";
    while($row = mysqli_fetch_assoc($result)){

		echo "<div class=\"posts\">";
		$value = $row["id"];
        echo "<a href='forumpost.php?post_id=$value'>".$row["title"]."</a><br>";
		if(strlen($row["post"]) > 198){
			echo "<p>".substr($row["post"], 0,198)."...</p>";
		}
		else{
			echo "<p>".$row["post"]."</p>";
		}
		echo "<p>posted by: ".$row["email_user"]."</p></div>";

    }
  }


  if(isset($_POST['delsub'])){
    foreach($_POST['checkdelete'] as $selected) {
      echo $selected;
        $sqldel = "DELETE FROM forum WHERE title = '$selected'";
        $delres = mysqli_query($conn,$sqldel);
		$sqldel2 = "DELETE FROM likes WHERE title = '$selected'";
		$delres2 = mysqli_query($conn,$sqldel2);
		$sqldel3 = "DELETE FROM comment WHERE title = '$selected'";
		$delres3 = mysqli_query($conn,$sqldel3);
}
	header("Refresh:0");
  }

 ?>
