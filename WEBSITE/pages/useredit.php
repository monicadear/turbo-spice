<?
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 Monica Flores 10K Webdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>


<? include ("exclusions.php"); ?>



<? include ("pagepartial0.php"); ?>


<?
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h1>User Account Edit Success!</h1>";
   echo "<p><b>$session->username</b>, your account has been successfully updated.<BR> "
       ."<a href=\"/pages/main.php\">Main</a>.</p>";
}
else{
?>

<?
/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if($session->logged_in){
?>



<SCRIPT LANGUAGE="JavaScript"><!--function noEntry() {if (document.editme.newpass.value.length<1) {     alert("Please fill in your desired new password.");		return false; }      else if (document.editme.newpass2.value.length<1) {     alert("Please re-type your desired new password.");		return false; }
	else if (document.editme.newpass2.value !== document.editme.newpass.value) {
alert("Your new password should match. Please re-type your password.");
		return false; }
else { return true; }}// --></SCRIPT>


<h1>User Account Edit: <span class=green><? echo $session->username; ?></span></h1>
(change password) &#124; <a href=useredit2.php>(change email)</a><BR><BR>

<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="/pages/process.php" method="POST" name=editme ONSUBMIT='return noEntry()';>
<table align="left" border="0" cellspacing="0" cellpadding="2">
<tr><th><span class=green>Change Password:</span></th>
<td>Current Password:</td>
<td><input type="password" name="curpass" maxlength="30" value="<?echo $form->value("curpass"); ?>"></td>
<td><? echo $form->error("curpass"); ?></td>
</tr>

<tr><td colspan=3></td></tr>

<tr><th></th>
<td>New Password:</td>
<td><input type="password" name="newpass" maxlength="30" value="<?echo $form->value("newpass"); ?>"></td>
<td><? echo $form->error("newpass"); ?></td>
</tr>

<tr><th></th>
<td>Re-type Password:</td>
<td><input type="password" name="newpass2" maxlength="30" value="<?echo $newpass2;?>"></td>
<td></td>
</tr>

<tr><td colspan="3" align="right">
<input type="hidden" name="subedit" value="1">
<input type="submit" value="Edit Account"></td></tr>
<tr><td colspan="3" align="left"></td></tr>
</table>
</form>

<?
}
}

?>





<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>