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
    background-image: url('reddot_bg2.jpg');
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
    height:6.2em;
    width: auto;
    margin: 0 auto;
    text-align: right;
    position: sticky;
    top:0;
    background-color: rgba(255, 255, 255, 1);
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
    cursor:pointer;
    overflow: hidden;
    outline:none;
    background-repeat:no-repeat;
    height:75px;
    width:75px;
    -webkit-transition-duration:0.5s;
  }
  .btnHead:hover{
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
  .dispdiv:hover{
    transition-duration: 0.5s;
    background-color:rgb(219,217,217);
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
    border-style: hidden;
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
  .profcontainer{
    margin-top:15px;
    margin-right: 20px;
    float:right;
    border-style: solid;
    width:30em;
    text-align: center;
    word-wrap: break-word;
    height:auto;
  }
</style>
  </head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn" id="signin_"></div>

    <?php
      include 'config.php';
      date_default_timezone_set('Asia/Manila');
  	  $CURRENT_DAY = date("M d Y");
  	  $YESTERDAY = date("M d Y", strtotime("-1 days"));
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
        }
    }
    echo "<div class=\"navbar\">
    <a href=\"landingpage.php\"><img class = \"logo\"src=\"RED_DOT_1.png\" height=60 width=60></a>
    <div class=\"dropdown\">
    <button class=\"profile\"><img class = \"ppic\" src='$profpic' width=65 height=65>
      <i class=\"fa fa-caret-down\"></i>
      </button>
      <div class=\"dropdown-content\">
        <a href='profile.php?user=$username'>Profile</a>
        <a href=\"editprofile.php\">Edit Profile</a>
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
		echo "<script>location.replace(\"searchpost.php?search_post=".$search."\")</script>";
	};

  $sql = "SELECT title, email_user, post, id, date, likes FROM forum WHERE email_user = '$email' ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);
  if($email == "201811471@feualabang.edu.ph" || $email == "201810285@feualabang.edu.ph" || $email == "201811597@feualabang.edu.ph" || $email == "201811285@feualabang.edu.ph"){
    echo "<form action = '' method = 'post'>";
    while($row = mysqli_fetch_assoc($result)){
      echo "<div class = 'dispdiv'>";
		echo "<div class=\"posts\">";
		$value = $row["id"];

				//DATE
		$check = $row["date"];
		$pos = strpos($check, "at");
		$check = substr($check ,0, $pos-1);
		$at_time = substr($row["date"] ,$pos-1, strlen($row["date"]));
		if($check == $CURRENT_DAY){
			echo"Today ".$at_time."</br>";
		}
		else if($check == $YESTERDAY){
			echo"Yesterday ".$at_time."</br>";
		}
		else{
			echo $row["date"]."</br>";
		}
				//DATE
        echo "<input type = 'checkbox' name = 'checkdelete[]' value = \"".$row["id"]."\"><a href='forumpost.php?post_id=$value'>".$row["title"]."</input></a><br>";
		if(strlen($row["post"]) > 198){
			echo "<p>".substr($row["post"], 0,198)."...</p>";
		}
		else{
			echo "<p>".$row["post"]."</p>";
		}
		echo "<p>votes: ".$row["likes"]."</p>";
		$get_comment = "SELECT comment from comment WHERE post_id='".$value."'";
		$get_comment_r = mysqli_query($conn, $get_comment);
		$count_comment = 0;
		while($row2 = mysqli_fetch_assoc($get_comment_r)){
			$count_comment = $count_comment + 1;
		}
		echo "<p>comments: ".$count_comment."</p></div>";
		$get_user = "SELECT username, profilepic from account WHERE email='".$row["email_user"]."'";
		$get_user_r = mysqli_query($conn, $get_user);
		while($row1 = mysqli_fetch_assoc($get_user_r)){
			echo "<p>posted by: </p><img src=\"".$row1["profilepic"]."\" height=\"25\" width=\"25\">";
			echo "<a href='profile.php?user=".$row1["username"]."'>".$row1["username"]."</a></div>";
		}
    echo "</div>";
    }
    echo "<input type='submit' name = 'delsub' value = 'Delete'>";
    echo "</form>";
  }
  else{

    while($row = mysqli_fetch_assoc($result)){
      echo "<div class = 'dispdiv'>";
		echo "<div class=\"posts\">";
		$value = $row["id"];
						//DATE
		$check = $row["date"];
		$pos = strpos($check, "at");
		$check = substr($check ,0, $pos-1);
		$at_time = substr($row["date"] ,$pos-1, strlen($row["date"]));
		if($check == $CURRENT_DAY){
			echo"Today ".$at_time."</br>";
		}
		else if($check == $YESTERDAY){
			echo"Yesterday ".$at_time."</br>";
		}
		else{
			echo $row["date"]."</br>";
		}
						//DATE
		echo "<a href='forumpost.php?post_id=$value'>".$row["title"]."</a><br>";
		if(strlen($row["post"]) > 198){
			echo "<p>".substr($row["post"], 0,198)."...</p>";
		}
		else{
			echo "<p>".$row["post"]."</p>";
		}
		echo "<p>votes: ".$row["likes"]."</p>";
		$get_comment = "SELECT comment from comment WHERE post_id='".$value."'";
		$get_comment_r = mysqli_query($conn, $get_comment);
		$count_comment = 0;
		while($row2 = mysqli_fetch_assoc($get_comment_r)){
			$count_comment = $count_comment + 1;
		}
		echo "<p>comments: ".$count_comment."</p></div>";
		$get_user = "SELECT username, profilepic from account WHERE email='".$row["email_user"]."'";
		$get_user_r = mysqli_query($conn, $get_user);
		while($row1 = mysqli_fetch_assoc($get_user_r)){
			echo "<p>posted by: </p><img src=\"".$row1["profilepic"]."\" height=\"25\" width=\"25\">";
			echo "<a href='profile.php?user=".$row1["username"]."'>".$row1["username"]."</a></div>";
		}
    echo "</div>";
    }
  }

  //POSTS MADE BY YOU
		$username = $_GET['user'];
		$username_sql = "SELECT username, profilepic ,summary from account WHERE username='".$username."'";
		$result1 = mysqli_query($conn, $username_sql);
		$result = mysqli_fetch_assoc($result1);
    echo "<div class='profcontainer'>";
		echo "</br><img src=\"".$result["profilepic"]."\" height=250 width=250 style='display:block; margin-left:auto; margin-right:auto; border-radius:150px;'>";
    	echo "<h1 style='color:black'>".$result["username"]."</h1>";
		echo "</br>Bio: ".$result["summary"];
    echo "</div>";
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
