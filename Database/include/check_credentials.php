		<?php
		require "mysql_connect.php";
		$result = mysql_query("SELECT * FROM kcs_accounts WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'") or die();
		$rows = mysql_num_rows($result);
		mysql_close($con);
		if($rows == 0)
		{
		echo 'There is a problem with your session data, please clear your cookies and login again.';
		die();
		}
		?>