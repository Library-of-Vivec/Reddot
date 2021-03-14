function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
	  c = c.substring(1);
	}
	if (c.indexOf(name) == 0) {
	  return c.substring(name.length, c.length);
    }
  }
  return "";
}

function check_login(){
	if(getCookie("email") == ""){
		alert('You must logged in first through Gmail');
		location.replace("loginpage.php");
	}
	
}

function check_reg(){
	if(getCookie("reg") == "no"){
		alert('You must complete first your registration.');
		location.replace("registration.php");
	}
	
}
//setup cookie yung para lang maproceed sa reg2 reg3 kung gugustuhin ng user pero nakinsert na sa database yan pagkaclick
function check_reg_setup(){
	if(getCookie("reg") == "yes" && getCookie("setup") == "complete"){
		alert('Your account has already been registered.');
		location.replace("landingpage.php");
	}
}

