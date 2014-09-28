<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kolby's Computers</title>
<?php include 'include/head.php'; ?>
<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
</head>

<body>

<div class="container">
  <div class="header">
  <?php include 'include/header.php'; ?>
  </div>
    <!-- end .header --></div>
  <div class="sidebar1">
  <?php include 'include/sidebar.php'; ?>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <h1>ERROR</h1>
    <h2>The Requested URL could not be retrieved</h2>
    <hr />
    <p>While trying to retrieve the URL: <a href=<?php echo curPageURL(); ?>><?php echo curPageURL(); ?></a></p>
    <p>The following error was encountered:</p>
    <ul>
    <li><b>404 - Page Not Found</b></li>
    </ul>
    <p>The page you have requested cannot be found on our servers. Please check for typing errors in the URL.</p>
    <hr />
    <p>If you believe you have reached this page in error, please click <a href="#">here</a> to report it.</p>
  <!-- end .content --></div>
  <div class="footer">
  <?php include 'include/footer.php'; ?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>