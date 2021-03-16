<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="functions.js"></script>



  <style>
  body{
    /*background-image: url('reddot_bg.jpg');*/
    background-color: rgb(44,53,57);
    background-size: cover;
  }
  .box{
    background-color:rgb(0,0,0);
    border-color: red;
    position: fixed;
    top:50%;
    left:50%;
    margin-top: -350px;
    margin-left: -180px;
    height: 700px;;
    width:350px;
    border-style: ridge;
    box-shadow: 10px 15px 10px rgb(0,0,0);
  }
  .g-signin2{
    margin:0;
    position:absolute;
    top:50%;
    left:48%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  .logo{
    display: block;
   margin-left: auto;
   margin-right: auto;
   width: 80%;
   height:25%;
   margin-top: 5em;
  }
  </style>
  </head>
  <body>
    <!--button-->
  <div class = 'box'>
	<div class="g-signin2" data-onsuccess="onSignIn" data-width="200" data-height="50"></div>
  <div class= "logocont"><img class ="logo" src="reddot_logo.gif"></div>
	<div id="content"></div>
  </div>
  <script>
	////GOOGLE SIGN BUTTON FUNCTION///////
    function onSignIn(googleUser){
		var profile = googleUser.getBasicProfile()
		//////CHECK ORGANIZATION///////
		document.cookie = "email=" + profile.getEmail();
		var valid_org = getCookie("email");
		var pos = valid_org.search("@");
		var res = valid_org.slice(pos+1, valid_org.length);
		if(res == "feudiliman.edu.ph" || res == "feualabang.edu.ph" || res == "fit.edu.ph" || res == "gmail.com"){
		   location.replace("loginpage.php");
		}
		else{
		  var auth2 = gapi.auth2.getAuthInstance();
		  auth2.disconnect();
		  ////DELETE COOKIE AFTER WRONG ENTRY/////
          document.cookie = "email=; expires=Thu, 01 Jan 1969 00:00:00 UTC; path=/;";
		  document.cookie = "reg=; expires=Thu, 01 Jan 1969 00:00:00 UTC; path=/;";
		  document.cookie = "setup=; expires=Thu, 01 Jan 1969 00:00:00 UTC; path=/;";
		  alert('Email Address must be an FEU Account');
		  location.replace("loginpage.php");
		  /////////////////////////////////////
		}
	}
  </script>
  <?php
    include 'config.php';
	//CHECK IF ACC IS REGISTERED
	if(isset($_COOKIE['email'])){
		$email = $_COOKIE['email'];
		$ifregistered_sql = "SELECT email from account";
	    $result = mysqli_query($conn, $ifregistered_sql);
		$check_register = false;
	    while($row = mysqli_fetch_assoc($result)){
	      foreach($row as $key => $value){
			if($email == $value){
			  $check_register = true;
			}
		  }
	    }
		if($check_register){
			setcookie("reg", "yes");
			setcookie("setup", "complete");
			echo "<script>location.replace(\"forumdisp.php\")</script>";
		}
		else{
			setcookie("reg", "no");
			setcookie("setup", "notcomplete");
			echo "<script>location.replace(\"registration.php\")</script>";
		}
    }
	//CHECK IF ACC IS REGISTERED
  ?>
  </body>
 </html>
