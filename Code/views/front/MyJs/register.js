function verifRegister(){
	
	 if (f.first.value=='')
	{ 
	alert ("Please Enter your first name ");
	return false;
	}
	else if (f.last.value=='')
	{ 
	alert ("Please Enter your last name ");
	return false;
	}
	else if (f.username.value=='')
	{ 
	alert ("Please Enter your username ");
	return false;
	}
	
	else if (f.pwd.value=='')
	{ 
	alert ("Check your password ");
	return false;
	}
    	
	else if (isNaN(f.num.value))
	{ 
	alert ("mobile NUMBER ");
	return false;
	}
	else if (f.num.value== '')
	{ 
	alert ("please enter a valid mobile NUMBER ");
	return false;
	}
	else if(f.mail.value == '' || f.mail.value.indexOf('@') == -1 || f.mail.value.indexOf('.') == -1) {
		alert ("Invalid Email")	;
		return false ;
    }
	else if (f.choixCity.value=="Choose...")
	{ 
	alert ("Choose your city ");
	return false;
	}
	
	else if (f.agree.checked==false)
	{ 
	return false;
	}
	
		
		
		
}

function verifRdv()
{
	if(f.date.value=="")
	{
		alert ("please enter the date ");
	return false;
	}
	else if (f.time.value=="")
	{
		alert ("please enter the time ");
	return false;
	}
	else if (f.refp.value=="")
	{
		alert ("please enter the Product Reference ");
	return false;
	}
	
}