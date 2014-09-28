    <font size="2">
    <center>
	<?php
	session_start();
	if(!isset($_SESSION["username"]))
	{
		?>
		<p>You are currently not logged in.</p>
		<p><a href="login.php">Login</a> <a href="register.php">Register</a></p>
		<?php
	}
	else
	{
		//try login to check if spoofed credentials
		require "include/check_credentials.php";
		?>
		<p>Welcome <i><u><?php echo $_SESSION['username']; ?></i></u><br /><a href="logout.php">Logout</a></p>
		<?php
	}
	?>
    </center>
    </font>