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

?>

<?php
    $id = $_GET['post_id'];
	$sql = "SELECT username from account WHERE email='".$email."'";
	$unamesql = mysqli_query($conn, $sql);
	$unameres = mysqli_fetch_assoc($unamesql);
	$uname = $unameres['username'];
    include 'config.php';
    $sql = "SELECT title, post ,email_user FROM forum WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $sqlemail = "SELECT email_user FROM forum WHERE id = '$id'";
    $emailres = mysqli_query($conn, $sqlemail);
    $emailfrdb = mysqli_fetch_assoc($emailres)['email_user'];
	$get_repsql = "SELECT * FROM report WHERE username = '$uname' AND post_id = '$id'";
	$reports = mysqli_query($conn, $get_repsql);
    if($emailfrdb == $_COOKIE['email'] || $email == "201811471@feualabang.edu.ph" || $email == "201810285@feualabang.edu.ph" || $email == "201811597@feualabang.edu.ph" || $email == "201811285@feualabang.edu.ph"){
      echo "<form action='' method = 'post'>";
      echo "<input type = 'submit' name = 'delpost' value = 'Delete'></input>";
      echo "</form>";
	  echo "<form action='' method = 'post'>";
      echo "<input type = 'submit' name = 'editpost' value = 'Edit'></input>";
      echo "</form>";
    }
	else{
	  if(mysqli_num_rows($reports) != 0){
		  echo "<form action='' method = 'post'>";
		  echo "<input type = 'submit' name = 'cancelreppost' value = 'Cancel Report'></input>";
		  echo "</form>";
	  }
	  else{
		  echo "<form action='' method = 'post'>";
		  echo "<input type = 'submit' name = 'reppost' value = 'Report'></input>";
		  echo "</form>";
	  }
	}
	if(isset($_POST['reppost'])){
	  header("location:reportpost.php?post_id=$id");
	}
	if(isset($_POST['editpost'])){
	  header("location:editpost.php?post_id=$id");
	}
	if(isset($_POST['cancelreppost'])){
	  $sqldel = "DELETE FROM report WHERE post_id = '$id' AND username = '$uname'" ;
      $delres = mysqli_query($conn,$sqldel);
	  $sql = "UPDATE forum SET reports = reports -1  WHERE id = '$id'";
	  $reports = mysqli_query($conn, $sql);
	  echo "<meta http-equiv='refresh' content='0'>";
	}
    if(isset($_POST['delpost'])){
      $sqldel = "DELETE FROM forum WHERE id = '$id'";
      $delres = mysqli_query($conn,$sqldel);
      $sqldel = "DELETE FROM likes WHERE post_id = '$id'";
      $delres = mysqli_query($conn,$sqldel);
      $sqldel = "DELETE FROM comment WHERE post_id = '$id'";
      $delres = mysqli_query($conn,$sqldel);
      header("Location:forumdisp.php");
    }
	
	    while($row = mysqli_fetch_assoc($result)){
			$get_user = "SELECT username from account WHERE email='".$row["email_user"]."'";
			$get_user_r = mysqli_query($conn, $get_user);
			while($row1 = mysqli_fetch_assoc($get_user_r)){
				echo "<h2 style='color:green'> Posted BY: ".$row1['username']."</h2><br>";;
			}
			echo "<h2> Title: ".$row["title"]."</h2><br>";
			echo $row["post"];
			echo "<br><br><br>";
			
    }
	
?>

<?php
    $sql = "SELECT likes FROM forum WHERE id = '$id'";
    $like = mysqli_query($conn, $sql);
	$numlikes = mysqli_fetch_assoc($like);
	echo "<h4>Number of helpfulness: ".$numlikes['likes']."</h4>";
	$sql = "SELECT * FROM likes WHERE username = '$uname' AND post_id = '$id'";
	$likes = mysqli_query($conn, $sql);
?>

<form method="POST">
    <input type="submit" name="like" value="Helpful"/>
</form>

<?php
	if(mysqli_num_rows($likes) != 0) {
		echo "You find this post as helpful.";
		if(isset($_POST['like'])){
			$sql = "UPDATE forum SET likes = likes - 1 WHERE id = '$id'";
			$likes = mysqli_query($conn, $sql);
			$sql = "DELETE FROM likes WHERE post_id = '$id'";
			$likes = mysqli_query($conn, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
	else {
		if(isset($_POST['like'])){
			$sql = "UPDATE forum SET likes = likes + 1 WHERE id = '$id'";
			$likes = mysqli_query($conn, $sql);
			$sql = "INSERT INTO likes(username, post_id)
                        VALUES('$uname', '$id')";
			$likes = mysqli_query($conn, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>

<?php
    $sql = "SELECT username, comment FROM comment WHERE post_id = '$id'";
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
	$comment = htmlspecialchars($comment, ENT_QUOTES);
    $sql = "INSERT INTO comment(post_id, username, comment)
                        VALUES('$id', '$uname', '$comment')";
    $insert = mysqli_query($conn,$sql);

    if($insert){
	  echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
      echo "comment could not be made.";
    }
  }
?>
 
<form action="" method="post" id="comment_form">
  <textarea name="comment" placeholder="Comment here" rows="5" cols="100" style="resize:none" id="comment_field"></textarea><br>
  <input type="submit" name="submit" value="Submit" id="submitbtn" disabled="disabled"></input>
</form>
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
	comment_form.addEventListener('input', () => {
		if(comment_field.value != ''){
			submitbtn.removeAttribute('disabled');
		}
		else{
			submitbtn.setAttribute('disabled', 'disabled');
		}
	});
  </script>
  </body>
  </html>

