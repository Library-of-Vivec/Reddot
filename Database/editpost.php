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
  *{
  padding: 0px;
  margin: 0px;
  }
    body {
      font-family: Arial, Helvetica, sans-serif;
    background-image: url('bg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    }
  .bodydiv{
    margin:5px;
    padding:5px;
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
    height:auto;
    width: auto;
    margin: 0 auto;
    text-align: right;
    position: sticky;
    top:0;
    background-color: rgba(36, 133, 36, 1);
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

	$id = $_GET['post_id'];
	$sql = "SELECT username from account WHERE email='".$email."'";
	$unamesql = mysqli_query($conn, $sql);
	$unameres = mysqli_fetch_assoc($unamesql);
	$uname = $unameres['username'];
	$sql = "SELECT title, post from forum WHERE id = '$id'";
	$title_postsql = mysqli_query($conn, $sql);
	$title_postres = mysqli_fetch_assoc($title_postsql);
	$title_res = $title_postres['title'];
	$post_res = $title_postres['post'];
	echo "<form action=\"\" method=\"post\" id=\"postform\">";
    echo "<textarea type=\"text\"  cols=\"50\" name=\"title\" id=\"title_field\">".$title_res."</textarea><br>";
    echo "<textarea name=\"post\"  rows=\"5\" cols=\"100\" style=\"resize:none\" id=\"post_field\">".$post_res."</textarea><br>";
    echo "<input type=\"submit\" name=\"submit\" value=\"Edit Post\" id=\"submitbtn\" disabled=\"disabled\"></input></form>";

	
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
	$title = htmlspecialchars($title, ENT_QUOTES);
	$post = htmlspecialchars($post, ENT_QUOTES);
	$email = $_COOKIE['email'];
    $sql = "UPDATE forum SET title = '$title', post = '$post' WHERE id ='$id' ";
    $insert = mysqli_query($conn,$sql);
	echo $title."<br>";
	echo $post."<br>";
	echo $email."<br>";
    if($insert){
      echo "edit post success";
	  echo '<script>alert("Post successfully editedt")</script>';
	  header("location:forumpost.php?post_id=$id");
    }
    else{
      echo "Post could not be made.";
    }
  }

 ?>


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
	postform.addEventListener('input', () => {
		if(title_field.value != '' && post_field.value != ''){
			submitbtn.removeAttribute('disabled');
		}
		else{
			submitbtn.setAttribute('disabled', 'disabled');
		}
	});
</script>
</body>
</html>
