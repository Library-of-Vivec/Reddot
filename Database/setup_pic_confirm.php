<html>
  <head>
  <meta name ="google-signin-client_id" content ="464035173680-dosfku2qd8dig2681irv594bk8u8uhar.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer> </script>
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
    background-color:rgb(59,59,59);
    margin-top:150px;
    margin-left:33%;
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
    margin-top:150px;
    margin-left:33%;
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
}
.submitpost:hover{
  transition-duration: 0.5s;
  background-color:rgb(87,87,87);
}
</style>
  </head>
  <body>
  <script>
	//// IF USER HASNT LOGGED IN VALIDATION in functions.js///
	check_login();
	////IF USER ISN"T REGISTERED VALIDATION///
	check_reg();
  </script>
  <div class = 'dispdiv'>
	<?php
    $email = $_COOKIE["email"];
	$pos = strpos($email,"@");
	$id = substr($email, 0, $pos);
	echo "Profile picture succesfully changed";
	if(isset($_POST['save']))
	{
	  copy("temp_profilepics/".$id.".png", "profilepics/".$id.".png");
	  $folder_path = "temp_profilepics";
	  $files = glob($folder_path.'/*');
		// Deleting all the files in the temp_profilepics
		foreach($files as $file) {
		  if(is_file($file))
				unlink($file);
		}
	}
	if(isset($_POST['home'])){
	  setcookie("setup", "complete");
    echo "<meta http-equiv = 'refresh' content = '0'>";
	  echo "<script>location.replace(\"landingpage.php\")</script>";
	}
	?>
	<form action="setup_pic_confirm.php" method="post">
      <input type="submit" class = "submitpost"value="Go To Home" name="home"> <br/>
    </form>
  </div>




  </body>
 </html>
