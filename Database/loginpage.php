<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="functions.js"></script>



  <style>
  .box{
    position: fixed;
    top:50%;
    left:50%;
    margin-top: -350px;
    margin-left: -180px;
    border-style: solid;
    height: 75%;
    width:20%;
  }
  .g-signin2{
    margin:0;
    position:absolute;
    top:50%;
    left:48%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  </style>
  </head>
  <body>
    <!--button-->
  <div class = 'box'>
	<div class="g-signin2" data-onsuccess="onSignIn" data-width="250" data-height="100"></div>
  <p>aslnd jklanwdjknasjkdnawlkhjdnasjldnlawkndasjln</p>
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
		  alert('Email Address must be a FEU ACC');
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
			echo "<script>location.replace(\"landingpage.php\")</script>";
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
