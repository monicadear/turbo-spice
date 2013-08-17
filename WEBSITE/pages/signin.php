<?
/**
 * Register.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 by Monica Flores 10kwebdesign
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
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<a href=\"/pages/main.php\">Main</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
          ."you may now <a href=\"/pages/main.php\">log in</a>.</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>

<h1>Sign in</h1>
Join us as a MEMBER for instantly available special rates, giveaways and promotions from our partners.<BR><BR>

<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>

<SCRIPT LANGUAGE="JavaScript">
<!--
function noEntry() {
var invalid = " ";

 if (document.processformsignin.user.value.length<1) {
alert("Please fill in the username.");
return false; }

else if (document.processformsignin.user.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the username.");
return false;
}

else { return true; }
}
// -->
</SCRIPT>

 
<form action="/pages/process.php" name="processformsignin" method="POST" ONSUBMIT="return noEntry()";>
 <table border="0" cellspacing="0" cellpadding="3">
 <tr><td>Username:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
 <tr><td>Password:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
 <tr><td>Email:</td><td><input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>"></td><td><? echo $form->error("email"); ?></td></tr>
 <tr><td colspan="2" align="right">
 <input type="hidden" name="subjoin" value="1">
 <input type="submit" value="Join!"></td></tr>
 <tr><td colspan="2" align="left"><a href="/pages/main.php">Back to Main</a></td></tr>
 </table>
 </form>

<BR><a href=/pages/privacy.php>Privacy Policy</a><BR>



<?
}
?>

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>