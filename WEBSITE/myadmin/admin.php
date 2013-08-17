<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 * Edits: February 10, 2010 monicadear
 */
include("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../myadmin/indexmain.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>


<? include ("adminheader.php"); ?>
<? include ("adminnav.php"); ?>



<span class=red>Logged in as <b><? echo $session->username; ?></b></span><br><br>
This is the USER ADMINISTRATION page.<BR>
<a href=/pages/signin.php>Add a user?</a><br>

<?
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Error with request, please fix</font><br><br>";
}
?>


<BR>


	<?
	/**
	 * Display Users Table
	 */
	?>
	<h3>Users Table Contents:</h3>

	<?
	displayUsers();
	?>


<BR><HR><BR>



	<?
	/**
	 * Update User Level
	 */
	?>
	<h3>Update User Level</h3>
	<? echo $form->error("upduser"); ?>

<form action="adminprocess.php" method="POST">
	<table border=0>
		<tr><td>
		Username:<br>
		<input type="text" name="upduser" maxlength="30" value="<? echo $form->value("upduser"); ?>">
		</td>
		<td>
		Level:<br>
		<select name="updlevel">
		<option value="1">1 General
		<option value="2">2 Board
		<option value="9">9 Admin
		</select>
		</td>
		<td>
		<br>
		<input type="hidden" name="subupdlevel" value="1">
		<input type="submit" value="Update Level">
		</td></tr>
	</table>
</form>


<BR><HR><BR>


	<?
	/**
	 * Delete User
	 */
	?>
	<h3>Delete User</h3>
	<? echo $form->error("deluser"); ?>
	<form action="adminprocess.php" method="POST">
	Username:<br>
	<input type="text" name="deluser" maxlength="30" value="<? echo $form->value("deluser"); ?>">
	<input type="hidden" name="subdeluser" value="1">
	<input type="submit" value="Delete User">
	</form>

<BR><HR><BR>

	<?
	/**
	 * Delete Inactive Users
	 */
	?>

	<h3>Delete Inactive Users</h3>

This will delete all users (not administrators), who have not logged in to the site within a certain time period. You specify the days spent inactive.<br><br>
	<form action="adminprocess.php" method="POST">
	<table border=0>
	<tr><td>
		Days:<br>
		<select name="inactdays">
		<option value="7">7
		<option value="14">14
		<option value="30">30
		<option value="100">100
		<option value="365">365
	</select>
	</td>
	<td>
	<br>
		<input type="hidden" name="subdelinact" value="1">
		<input type="submit" value="Delete All Inactive">
	</td></tr>
	</table>
	</form>

<BR><HR><BR>




/**
 * Ban User
 */
?>
	<h3>Ban User</h3>
	<? echo $form->error("banuser"); ?>
	<form action="adminprocess.php" method="POST">
	Username:<br>
	<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
	<input type="hidden" name="subbanuser" value="1">
	<input type="submit" value="Ban User">
	</form>

<BR><HR><BR>



	<?
	/**
	 * Display Banned Users Table
	 */
	?>
	
	<h3>Banned Users Table Contents:</h3>
	
	<?
	displayBannedUsers();
	?>

<BR><HR><BR>


<?
/**
 * Delete Banned User
 */
?>
	<h3>Delete Banned User</h3>
	<? echo $form->error("delbanuser"); ?>
	<form action="adminprocess.php" method="POST">
	Username:<br>
	<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
	<input type="hidden" name="subdelbanned" value="1">
	<input type="submit" value="Delete Banned User">
	</form>


<BR>
</body>
</html>
<?
}
?>

