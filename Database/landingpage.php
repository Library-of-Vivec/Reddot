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
  <img class = \"logo\" src = \"RED_DOT.png\">
	<div class=\"dropdown\">
	<button class=\"profile\"><img src='$profpic' width=30 height=30>&nbsp;&nbsp;$username
	  <i class=\"fa fa-caret-down\"></i>
	  </button>
	  <div class=\"dropdown-content\">
      <a href=\"\">Profile</a>
      <a href=\"\">Edit Profile</a>
      <a href='' onclick =\"signOut()\">Sign Out</a>
      </div>
	</div>";
	echo "</div>";
	//DISPLAY USERNAME AND PROFILE PIC
  ?>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida massa vel dignissim luctus. Nam interdum lacus vitae ligula fermentum, ac feugiat augue fermentum. Nullam sit amet odio sollicitudin, finibus orci id, aliquet odio. Fusce lacinia ultrices diam, vel tincidunt lorem feugiat vel. Suspendisse interdum congue magna ut pellentesque. Donec imperdiet, justo ac elementum euismod, arcu erat tristique sem, ut cursus ipsum massa cursus elit. Duis hendrerit nisl vel elementum fringilla. Nam dictum eleifend metus ac dignissim. Curabitur feugiat facilisis vehicula. Vestibulum in odio sit amet justo condimentum feugiat. Etiam ut eros felis. Donec erat leo, aliquam sed rutrum in, imperdiet non erat. Phasellus fermentum a sapien vel dictum. Vivamus porta maximus magna, sit amet efficitur mauris maximus a. Duis cursus, ipsum eu tristique mattis, ipsum velit ultrices turpis, at eleifend augue tortor vel est.
<br><br><br><br><br><br><br><br><br><br><br><br>
Nullam quis quam vitae nisi finibus feugiat ac nec purus. Donec scelerisque semper ultrices. Vestibulum eget ipsum id orci bibendum mattis a a justo. Nulla facilisi. Sed at elementum nisl. Aliquam vehicula mauris id enim pretium, a laoreet tortor tristique. Aliquam erat volutpat. Phasellus nulla tortor, interdum ac aliquet vel, rutrum sit amet sem. Aliquam erat volutpat. Donec ex mauris, finibus vel facilisis id, volutpat eu metus. Quisque commodo arcu nisi, vel vestibulum lacus tempus vel.
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
Sed in congue arcu, eu elementum nibh. Donec condimentum enim eu lorem molestie malesuada. Aliquam erat volutpat. Vestibulum pulvinar mattis sollicitudin. Nunc mattis feugiat nulla, a suscipit magna. Nulla at enim hendrerit nulla ullamcorper ultrices ut eu sapien. Morbi ultrices aliquam rhoncus. Proin cursus suscipit dolor in volutpat. Donec vel turpis consectetur, luctus odio at, interdum justo. Aenean maximus eu magna ut bibendum. Pellentesque ut commodo felis. Donec luctus vitae magna luctus rhoncus. Nam condimentum rhoncus aliquam. Phasellus fringilla eros eu lectus finibus ornare. Donec semper sit amet ipsum id dictum. Ut quis sapien dui.
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
Vivamus porttitor, massa aliquet tristique placerat, mauris lacus fermentum sapien, vel convallis sapien quam quis dolor. Fusce sit amet eleifend felis, in porta metus. Mauris sit amet quam blandit, facilisis diam vel, hendrerit nibh. Nunc eu turpis ipsum. Aliquam non enim at risus imperdiet lacinia. In elementum vel massa ultricies aliquet. Sed in lobortis nibh, eu posuere orci. Aenean cursus quam vitae metus varius malesuada. Fusce ante metus, rutrum eu sapien a, viverra accumsan nibh. Etiam interdum, ipsum nec imperdiet eleifend, ex neque mattis sapien, eu imperdiet mi velit at tortor. Phasellus ut nisl diam. Aliquam placerat, ligula sit amet blandit facilisis, odio diam lobortis diam, a elementum justo nibh sed risus.
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
Quisque et libero ut velit rutrum aliquam. Aenean sit amet sapien lacus. Vestibulum dolor nulla, faucibus in dolor vitae, vestibulum consectetur ante. Mauris felis erat, ullamcorper sed eros sed, aliquam lacinia nunc. Nam ac egestas turpis. Sed interdum mi ut feugiat euismod. Morbi feugiat accumsan ornare. Praesent nec mauris vel metus consequat convallis. In dignissim ipsum non varius posuere.
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
  </body>
 </html>
