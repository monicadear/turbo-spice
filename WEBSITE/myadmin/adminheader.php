<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<h4>Administration</h4>
<div align=center><img src=/images/logo.jpg height=50></div>

<div id=indent>

<? $dest = "/home/content/t/t/t/pathtodestination/html/"; ?>


<? $websitefullurl = "http://www.10kgroup.com"; ?>
<? $websitestorelink = "http://www.10kgroup.com"; ?>

<?
echo "<div id=welcomeadmin>\n";
   echo "Welcome, <b>$session->username</b>.<BR>";

if ($session->logged_in) {
	echo "You are at user level: $session->userlevel<BR>\n";
	echo "You are currently logged-in.  <a href=/pages/process.php>[Logout?]</a><BR>\n\n";
}
echo "</div>\n";
?>