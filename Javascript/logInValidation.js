// JavaScript Document

function LoginIsValid()
{
return true;
}
function SignUpIsValid()
{
  	var firstname = document.getElementById("SUfirstname").value;
	var lastname = document.getElementById("SUlastname").value;
	var email = document.getElementById("SUemail").value;
	var password = document.getElementById("SUpassword").value;
	var confirmpassword = document.getElementById("SUconfirmpassword").value;
	var isValid = true;
	
	if(firstname == "" || firstname == null)
	{
	  isValid = false;
	  document.getElementById("FnameERR").innerHTML = "Required";
	  	
	}
	if(lastname == "" || lastname == null)
	{
	  isValid = false;
	  document.getElementById("LnameERR").innerHTML = "Required";
	  	
	}
	if(email == "" || email == null)
	{
	  isValid = false;
	  document.getElementById("emailERR").innerHTML = "Required";
	  	
	}
	if(password == "" || password == null)
	{
	  isValid = false;
	  document.getElementById("passwordERR").innerHTML = "Required";
	  	
	}
	if(confirmpassword == "" || confirmpassword == null)
	{
	  isValid = false;
	  document.getElementById("CpasswordERR").innerHTML = "Required";
	  	
	}
	if(password != confirmpassword)
	{
	  isValid = false;
	  document.getElementById("CpasswordERR").innerHTML = "Passwords do not Match";	
	}
	
	  return isValid;	
}
function LogOutIsValid()
{
	return true;
}
function EmailOnBlur()
{
	var myreturn = document.getElementById("emailERR").innerHTML = "Email on Blur fired off";
	return myreturn;
}
function loadXMLDoc(emailToCheck)
{
var xmlhttp = new XMLHttpRequest();


xmlhttp.onreadystatechange= function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("emailERR").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","PHPs/checkEmail.php?email=" + emailToCheck,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}
function startTime() {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clienttime').innerHTML = h+":"+m+":"+s;
    var t = setTimeout(function(){startTime()},1100);
}

function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function get(id){ return document.getElementById(id); }





