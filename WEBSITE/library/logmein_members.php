<!-- logmein.php -->

<div id=sidebarlogin>
<?
/**
 * User has already logged in, so display relevant links, including
 * a link to the admin center if the user is an administrator.
 */


if($session->logged_in){
   echo "Welcome <b>$session->username</b> <br>";

   if($session->isAdmin()){
      echo "[<a href=\"/myadmin/indexadmin.php\" class=whitetoptop>Admin Center</a>] &nbsp; ";

    }

  echo "[<a href=\"/members/useredit.php\" class=whitetoptop>Edit Account</a>] &nbsp;&nbsp;";

   echo "[<a href=\"/members/process.php\" class=whitetoptop>Logout</a>]<BR>";






}


else{
?>

<?
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>


<form action="/pages/process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="2">


<tr><th class=loginform>User: </th><td><input type="user" name="user" size="10" value="<? echo $form->value("user"); ?>"></td><td></td></tr>
<tr><td colspan=3><span class=redbackground><? echo $form->error("user"); ?></span></td></tr>
<tr><th class=loginform>Password: </th><td><input type="password" name="pass" size="10" value="<? echo $form->value("pass"); ?>"></td><td class=loginform><input type="hidden" name="sublogin" value="1">
<input type="submit" value="login"></td></tr>
<tr><td colspan=3><span class=redbackground><? echo $form->error("pass"); ?></span></td></tr>
</table>

</form>


<BR clear=all><a href=/pages/forgotpass.php class=smaller>Forgot password?</a>



<?


}


?>




</div> <!-- end sidebarlogin -->