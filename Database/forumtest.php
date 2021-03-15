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
      float: right;
      overflow: hidden;
    }
  .dropbtn{
    width:177px;
  }
    .dropdown-content {
      cursor:pointer;
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
    height:5em;
    width: auto;
    margin: 0 auto;
    text-align: right;
    position: sticky;
    top:0;
    background-color: rgba(255, 255, 255, 0.7);
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
  .profile{
    height: 100%;
    width:160px;
    border-style: none;
    padding: 15px 32px;
    display: inline-block;
    margin-right: 10%;
  }
  button img{
    vertical-align: middle;
  }
  .btnHead{
    float:left;
    background-color:transparent;
    background-repeat: no-repeat;
    border: none;
    border-radius:15px;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    background-repeat:no-repeat;
    height:75px;
    width:150px;
    -webkit-transition-duration:0.5s;
  }
  .logo{
    height: 75px;
    width: 75px;
    display: inline-block;
    margin-left: auto;
    margin-right: 45em;
  }
  </style>
  </head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn" id="signin_"></div>

    <!-- MENU TAB DROPDOWN-->
    <?php
      include 'config.php';
    //DISPLAY USERNAME AND PROFILE PIC
    $email = $_COOKIE['email'];
    $profpic = "";
    $username = "";
    $username_sql = "SELECT username, profilepic from account WHERE email='".$email."'";
    $result1 = mysqli_query($conn, $username_sql);
    if(mysqli_num_rows($result1)>0){
        while($row = mysqli_fetch_assoc($result1)){
          $username = $row['username'];
          $profpic = $row['profilepic'];
      //echo "Username: ".$row["username"];
      //echo "</br>Profile Pic: <img src=\"".$row["profilepic"]."\" height=50 width=50>";
        }
    }
    echo "<div class=\"navbar\">
    <button class = \"btnHead\"><a href=\"landingpage.php\"><img src=\"home.png\" height=50 width=50></a></button>
    <button class = \"btnHead\"><a href=\"forumtest.php\"><img src=\"create.png\" height=50 width=50></a></button>
    <button class = \"btnHead\"><a href=\"display_all.php\"><img src=\"likes.png\" height=50 width=50></a></button>
    <img class = \"logo\" src = \"RED_DOT_1.png\">
    <div class=\"dropdown\">
    <button class=\"profile\"><img src='$profpic' width=30 height=30>&nbsp;&nbsp;$username
      <i class=\"fa fa-caret-down\"></i>
      </button>
      <div class=\"dropdown-content\">
        <a href=\"profile.php\">Profile</a>
        <a href=\"\">Edit Profile</a>
        <a href='' onclick =\"signOut()\">Sign Out</a>
        </div>
    </div>";
    echo "</div>";
    //DISPLAY USERNAME AND PROFILE PIC


  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
	$title = htmlspecialchars($title, ENT_QUOTES);
	$post = htmlspecialchars($post, ENT_QUOTES);
	$email = $_COOKIE['email'];
    $sql = "INSERT INTO forum(title, post, email_user)
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

<form action="" method="post" id="postform">
  <textarea cols="50" type="text" name="title" placeholder="Title here" id="title_field"></textarea><br>
  <textarea name="post" placeholder="Post here" rows="5" cols="100" style="resize:none" id="post_field"></textarea><br>
  <input type="submit" name="submit" value="Submit" id="submitbtn"disabled="disabled"></input>
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
