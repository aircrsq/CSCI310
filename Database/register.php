<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kolby's Computers</title>
<?php include 'include/head.php'; ?>
<script language="JavaScript">
<!-- // ignore if non-JS browser
function Validator(form)
{
	var error = "";
	if (form.username.value == "")
	{
		error += "Please provide a username.\n";
	}
	if (form.password.value == "")
	{
		error += "Please provide a password.\n";
	}
	if (form.firstname.value == "")
	{
		error += "Please provide a first name.\n";
	}
	if (form.lastname.value == "")
	{
		error += "Please provide a last name.\n";
	}
	if (form.streetaddress.value == "")
	{
		error += "Please provide a street address.\n";
	}
	if (form.city.value == "")
	{
		error += "Please provide a city.\n";
	}
	if (form.pcode.value == "")
	{
		error += "Please provide a postal code.\n";
	}
	if (form.phone.value == "")
	{
		error += "Please provide a phone number.\n";
	}
	if (form.email.value == "")
	{
		error += "Please provide an email address.\n";
	}
	if (form.province.options[0].selected == true)
	{
		error += "Please select a province.\n";
	} 
	if (form.agree_tos.checked == false)
	{
		error += "You must agree to the terms of service.\n";
	}
	if (form.agree_priv.checked == false)
	{
		error += "You must agree to the privacy policy.\n";
	}
	if ((form.email.value.indexOf ('@',0) == -1 || form.email.value.indexOf ('.',0) == -1) && form.email.value != "")
	{
		error += "Please verify that your email address is valid.";
	}
	if (error != "")
	{
		alert(error);
		return (false);
	}
	else
	{
		return (true);
	} 
}
// -->
</script> 
</head>

<body>

<div class="container">
  <div class="header">
  <?php include 'include/header.php'; ?>
    <!-- end .header --></div>
  <div class="sidebar1">
  <?php include 'include/sidebar.php'; ?>
    <!-- end .sidebar1 --></div>
  <div class="content">
  <p><?php if(isset($_POST["username"]))
		{
		//Get all fields from _POST and put them in variables
			$break = false;
			$username = $_POST["username"];
			$password = $_POST["password"];
			$email = $_POST["email"];
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$streetaddress = $_POST["streetaddress"];
			$city = $_POST["city"];
			$pcode = $_POST["pcode"];
			$province = $_POST["province"];
			$phone = $_POST["phone"];
			$optin_newsletter = $_POST["optin_newsletter"];
			$optin_news = $_POST["optin_news"];
			$agree_tos = $_POST["agree_tos"];
			$agree_priv = $_POST["agree_priv"];
			// array of values to check, if javascript checker misses them
			$toCheck = array( 'username', 'password', 'email', 'firstname', 'lastname', 'streetaddress', 'city', 'pcode', 'province', 'phone', 'agree_tos', 'agree_priv' ); 
			$count = count( $toCheck );
			//loop through to check if empty values
			for( $i = 0; $i < $count; $i++ )
			{
				if( $_POST[$toCheck[$i]] == '' )
				{
					echo $toCheck[$i] . ' was left empty';
					$break = true;
				}
			}
			//check if username or email already exists
			require "include/mysql_connect.php";
			$un_result = mysql_query("SELECT * FROM kcs_accounts WHERE username='$username'") or die();
			$email_result = mysql_query("SELECT * FROM kcs_accounts WHERE email='$email'") or die();
			$un_rows = mysql_num_rows($un_result);
			$email_rows = mysql_num_rows($email_result);
			mysql_close($con);
			if($un_rows != 0)
			{
				echo 'The username specified already exists in the database.';
				$break = true;
			}
			if($email_rows != 0)
			{
				echo 'The email specified already exists in the database.';
				$break = true;
			}
			//if no errors yet, run entry
			if(!$break)
			{
			
				session_start(); 
				require "include/mysql_connect.php";
				mysql_query("INSERT INTO kcs_accounts (username, password, email, firstname, lastname, streetaddress, city, pcode, province, phone, optin_newsletter, optin_news, agree_tos, agree_priv)
				VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$streetaddress', '$city', '$pcode', '$province', '$phone', '$optin_newsletter', '$optin_news', '$agree_tos', '$agree_priv')") or die();
				mysql_close($con);
				echo "Account Created.";
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				echo "You are now logged in.";
				?><a href="http://kolbyscopmputers.ca"><?php echo "Click here if you are not redirected."; ?></a><?php
				header('Location: http://kolbyscomputers.ca');
			}
		}
		else
		{
	?></p>
    <p>Please register below, this account will be used for all services and features of this website. This account is also used for all products and services purchased in-store.</p>
	<br /><strong>Account Information</strong><br /><br />
    <form name="input" action="register.php" method="post" onsubmit="return Validator(this)"><p><br />
	Username: <br /><input type="text" size="50" name="username" /><br />
	Password: <br /><input type="password" size="50" name="password" /><br />
	Email Address: <br /><input type="text" size="50" name="email" /><br />
	<br /><strong>Billing Information</strong><br /><br />
	First name: <br /><input type="text" size="50" name="firstname" /><br />
	Last name: <br /><input type="text" size="50" name="lastname" /><br />
	Street Address: <br /><input type="text" size="50" name="streetaddress" /><br />
	City: <br /><input type="text" size="50" name="city" /><br />
	Postal Code: <br /><input type="text" size="50" name="pcode" /><br />
	Province / Territory: <br /><select name="province">
					<option value="">Choose a province</option>
					<option>Alberta</option>
					<option>British Columbia</option>
					<option>Manitoba</option>
					<option>New Brunswick</option>
					<option>Newfoundland & Labrador</option>
					<option>Northwest Territories</option>
					<option>Nova Scotia</option>
					<option>Nunavut</option>
					<option>Ontario</option>
					<option>Prince Edward Island</option>
					<option>Quebec</option>
					<option>Saskatchewan</option>
					<option>Yukon</option>
					</select><br />
	Phone: <br /><input type="text" size="50" name="phone" /><br /><br />
	<br /><input type="checkbox" name="optin_newsletter" value="1" /> Please send me the monthly newsletter.
	<br /><input type="checkbox" name="optin_news" value="1" /> Please send me information about new website features or other news.<br />
	<br /><input type="checkbox" name="agree_tos" value="1" /> I have read and agree to the <a href="">Terms Of Service</a>.
	<br /><input type="checkbox" name="agree_priv" value="1" /> I have read and agree to the <a href="">Privacy Policy</a>.<br />
	<br /><input type="submit" value="Submit" />
	</p></form>
	<?php } ?>
    <!-- end .content --></div>
  <div class="footer">
  <?php include 'include/footer.php'; ?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>