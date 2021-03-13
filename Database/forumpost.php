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
        <a href="forumtest.php">Forum Test</a>
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

?>

<?php
    $title = $_GET['title'];
    include 'config.php';
    $sql = "SELECT title, post ,email_user FROM forum WHERE title = '$title'";
    $result = mysqli_query($conn, $sql);
	    while($row = mysqli_fetch_assoc($result)){
      foreach($row as $key => $value){
		echo "<h2 style='color:green'> Posted BY: ".$row['email_user']."</h2><br>";
        echo "<h2> Title: ".$row["title"]."</h2><br>";
        echo $row["post"];
        echo "<br><br><br>";
        break;
      }
    }
?>

<?php
    $sql = "SELECT likes FROM forum WHERE title = '$title'";
    $like = mysqli_query($conn, $sql);
	$numlikes = mysqli_fetch_assoc($like);
	$sql = "SELECT username from account WHERE email='".$email."'";
	$unamesql = mysqli_query($conn, $sql);
	$unameres = mysqli_fetch_assoc($unamesql);
	echo "<h4>Number of helpfulness: ".$numlikes['likes']."</h4>";
	$uname = $unameres['username'];
	$sql = "SELECT * FROM likes WHERE username = '$uname' AND title = '$title'";
	$likes = mysqli_query($conn, $sql);
?>

<form method="POST">
    <input type="submit" name="like" value="Helpful"/>
</form>

<?php
	if(mysqli_num_rows($likes) != 0) {
		echo "You find this post as helpful.";
	}
	else {
		if(isset($_POST['like'])){
			$sql = "UPDATE forum SET likes = likes + 1 WHERE title = '$title'";
			$likes = mysqli_query($conn, $sql);
			$sql = "INSERT INTO likes(username, title)
                        VALUES('$uname', '$title')";
			$likes = mysqli_query($conn, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>

<?php
    $sql = "SELECT username, comment FROM comment WHERE title = '$title'";
    $result = mysqli_query($conn, $sql);
	echo "<h3>Comments section: </h3>";
    while($row = mysqli_fetch_assoc($result)){
      foreach($row as $key => $value){
		echo $row['username'].": ";
        echo $row["comment"]."<br>";
        break;
      }
    }
?>

<?php
  if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comment(title, username, comment)
                        VALUES('$title', '$uname', '$comment')";
    $insert = mysqli_query($conn,$sql);

    if($insert){
	  echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
      echo "comment could not be made.";
    }
  }
?>
 
<form action="" method="post">
  <textarea name="comment" placeholder="Comment here" rows="5" cols="100" style="resize:none"></textarea><br>
  <input type="submit" name="submit" value="Submit"></input>
</form>

