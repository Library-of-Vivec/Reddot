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
@font-face{
  font-family:fontnikelsey;
  src: url('space-mono.ttf');
}
  *{
  padding: 0px;
  margin: 0px;
  font-family:fontnikelsey;
  }
    body {
      font-family: Arial, Helvetica, sans-serif;
    background-image: url('pages_bg.jpg');
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
      background-color: rgba(44,55,57,1);
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
    height:6.2em;
    width: auto;
    margin: 0 auto;
    text-align: right;
    position: sticky;
    top:0;
    background-color: rgba(44, 53, 57, 1);
    box-shadow:0px 2px 5px grey;
  }
  button{
    transition-duration: 0.5s;
    background-color:white;
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
    background-color: rgba(0,0,0,0);
    height: 100%;
    width:160px;
    border-style: none;
    padding: 15px 32px;
    display: inline-block;
    margin-right: 10%;
  }
  .profile:hover{
    background-color: rgba(0,0,0,0);
    height: 100%;
    width:160px;
    border-style: solid;
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
    cursor:pointer;
    overflow: hidden;
    outline:none;
    background-repeat:no-repeat;
    height:75px;
    width:75px;
    -webkit-transition-duration:0.5s;
  }
  .logo{
    float:left;
    height: 75px;
    width: 75px;
    display: inline-block;
    margin-left: 30px;
    margin-top: 10px;
  }
  .ppic{
    border-radius: 35px;
  }
  .searchbtn{
    margin-top: 9px;
    margin-left: 10px;
    background:url(search.png) 5px 10px no-repeat;
    height:3.3em;
    width:10px;
    float:left;
  }
  .searchbtn:disabled:hover{
    margin-left: 10px;
    float:left;
    background:url(search.png) 5px 10px no-repeat;
    cursor:not-allowed;
  }
  .searchbtn:hover{
    margin-left: 10px;
    float:left;
    background:url(search3.png) 5px 10px no-repeat;
    cursor:pointer;
  }
  .searchbox{
    background-color: rgba(0,0,0,0);
    border-top:none;
    border-left:none;
    border-right:none;
    float:left;
    margin-top:30px;
    margin-left:325px;
    height:2em;
    width:50em;
    font-size:15pt;
  }
  .searchbox:focus{
    outline:none;
    border-left:none;
    border-top:none;
    border-right:none;
    float:left;
    margin-top:30px;
    margin-left:325px;
    height:2em;
    width:50em;
    font-size:15pt;
  }
  .dispdiv{
    transition-duration: 0.5s;
    background-color:rgb(130,130,130);
    margin-top:25px;
    margin-left:15%;
    float:left;
    border-width: 1px;
    border-style:solid;
    padding:7px;
    border-radius: 5px;
    width:35%;
    height:auto;
    color:rgb(182,182,180);
  }
  .dispdivcreate{
    border-color:white;
    background-color:rgb(59,59,59);
    margin-top:0px;
    margin-left:15%;
    margin-bottom:25px;
    float:left;
    border-width: 1px;
    border-style:solid;
    padding:7px;
    border-radius: 5px;
    width:35%;
    height:auto;
  }
  .dispdiv:hover{
    transition-duration: 0.5s;
    background-color:rgb(59,59,59);
    margin-top:25px;
    margin-left:15%;
    float:left;
    border-width: 1px;
    border-style:solid;
    padding:7px;
    border-radius: 5px;
    width:35%;
    height:auto;
  }
  .createpost{
    transition-duration: 0s;
    border-style: hidden;
    border-radius: 6px;
    padding-left:10px;
    padding-top:15px;
    text-align: left;
    background-color:rgb(130,130,130);
    height:50px;
    width:100%;
    font-size:12pt;
  }
  .createpost:hover{
    transition-duration: 0s;
    border-style: solid;
    border-color: black;
    border-radius: 6px;
    background-color:rgb(59,59,59);
    padding-left:10px;
    padding-top:15px;
    text-align: left;
    height:50px;
    width:100%;
    cursor:text;
    font-size:12pt;
  }
  .rightitems{
    margin-bottom:20px;
    background-color:white;
    width:auto;
    margin-bottom:10px;
    font-size:15pt;
    background-color:rgb(59,59,59);
    color:rgb(182,182,180);
    border-bottom: solid 1px white;
    padding:5px;

  }
  .rightcontainer{
    background-color:rgb(59,59,59);
    overflow-x: hidden;
    overflow-y: auto;
    margin-top:50px;
    margin-left:1000px;
    border-width: 0.5px;
    border-style:solid;
    border-radius: 5px;
    width:35%;
    height:auto;
    border-color: white;

  }
  a{
    font-weight: bold;
    text-decoration: none;
    color:white;
  }
  input[type="submit"]{
    font-size:13pt;
    width:auto;
    color: black;
    text-align: center;
    background-color:rgb(130,130,130);
    border: none;
    padding:5px;
    border-radius: 4px;
}
.boxcontainer{
  background-color:rgba(255,255,255,0.5);
  margin:auto;
  margin-top: 100px;
  border-width: 1px;
  border-style:solid;
  padding:7px;
  border-radius: 5px;
  width:50%;
}
.textareas::-webkit-input-placeholder{
 text-align: center;
 color:white;
}
.textareas{
  width: 100%;
  padding:10px;
  resize: none;
  background-color:rgb(59,59,59);
  color:white;
}
.submitpost{
  transition-duration: 0.5s;
  margin-left:auto;
  margin-right:auto;
  display:block;
}
.submitpost:hover{
  transition-duration: 0.5s;
  background-color:rgb(87,87,87);
}
</style>
  </head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn" id="signin_"></div>

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
    <a href=\"landingpage.php\"><img class = \"logo\"src=\"RED_DOT_white.png\" height=60 width=60></a>
    <div class=\"dropdown\">
    <button class=\"profile\"><img class = \"ppic\" src='$profpic' width=65 height=65>
      <i class=\"fa fa-caret-down\"></i>
      </button>
      <div class=\"dropdown-content\">
      <a href='profile.php?user=$username'>Profile</a>
      <a href=\"editprofile.php\">Edit Profile</a>
      <a href=\"display_all.php\">Liked Posts</a>
      <a onclick =\"signOut()\">Sign Out</a>
        </div>
    </div>";
    echo "
    <div class=\"search-container\">
    <form action=\"\" method=\"post\" id=\"searchform\">
      <input rows = '5' type=\"text\" name=\"search_field\" placeholder=\"Search...\" id=\"search_field\" class='searchbox'></input><br>
      <button type=\"submit\" name=\"search\" value=\"Search\" id=\"searchbtn\" disabled=\"disabled\" class='searchbtn'></button>
    </form>
    </div>";
    echo "</div>";
    //DISPLAY USERNAME AND PROFILE PIC
  //CREATE POST BUTTON
	if(isset($_POST['search'])){
		$search = $_POST['search_field'];
		header("location:searchpost.php?search_post=$search");
	}
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
	$title = htmlspecialchars($title, ENT_QUOTES);
	$post = htmlspecialchars($post, ENT_QUOTES);
	$email = $_COOKIE['email'];
	date_default_timezone_set('Asia/Manila');
	$TIME = date("G:i A");
	$DATE = date("M d Y");
	$DATE_F = $DATE.' at '.$TIME;
    $sql = "INSERT INTO forum(title, post, email_user, date)
                        VALUES('$title', '$post', '$email', '$DATE_F')";
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
<div class = 'boxcontainer'>
<form action="" method="post" id="postform">
  <textarea class = 'textareas' type="text" name="title" placeholder="Title here..." id="title_field" style="resize:none"></textarea><br>
  <textarea class = 'textareas' name="post" placeholder="Post here..." rows="20"  style="resize:none" id="post_field"></textarea><br>
  <input class = 'submitpost' type="submit" name="submit" value="Submit" id="submitbtn" disabled="disabled"></input>
</form>
</div>
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
	searchform.addEventListener('input', () => {
        if(search_field.value != ''){
            searchbtn.removeAttribute('disabled');
        }
        else{
            searchbtn.setAttribute('disabled', 'disabled');
        }
    });
</script>
</body>
</html>
