<?
/**
 * contactmemberform.php
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


<script type= "text/javascript">
var RecaptchaOptions = {
theme: 'clean'
};
</script>

<? include ("exclusions.php"); ?>


<? include ("pagepartial0.php"); ?>

<div id=pagecontentindent2>
<h1>Contact This Member</h1>

<?
$passid=$_GET['id'];

if (isset($passid) && ($passid !=="")) 

{
 include ("../codes/adminconfig.php"); 

$dbmember = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querymember= "SELECT * FROM directory where id='$passid'"; $sql_resultmember = mysql_query($querymember, $connection) or die ("Couldn't execute query. Please try again later"); while ($myrow = mysql_fetch_array($sql_resultmember)){                    $passid=$myrow["id"];					                      $picturemember=$myrow["picture1"];                   $firstnamemember=$myrow["firstname"];                   $lastnamemember=$myrow["lastname"];$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";

echo "<div id=indent><table border=0>";echo "<tr>";echo "<td valign=top>Send a message to:<BR><b>$firstnamemember $lastnamemember</b><BR></td>\n";
echo "<td width=155>";
if (isset($picturemember) && $picturemember !== "") {
echo "<img src=/memberuploads/$picturemember width=150 border=0>";		}

		else 		{echo "<img src=/images/icons/personal.gif width=100 border=0>";				}

echo "</td>";


echo "</tr></table></div>";}

?>

<?$ip = $_SERVER['REMOTE_ADDR'];?>




<SCRIPT LANGUAGE="JavaScript"><!--function noEntry() {if (document.emailform.myname.value.length<1) {     alert("Please fill in your name.");		return false; }      else if (document.emailform.myemail.value.length<1) {     alert("Please fill in your email. We keep your information private.");		return false; }      else if (document.emailform.myphone.value.length<1) {     alert("Please fill in your phone number.");		return false; }
      else if (document.emailform.subject.value.length<1) {     alert("Please fill in the nature of your request.");		return false; }
else { return true; }}// --></SCRIPT>



<!-- beginning of contact form text -->
<FORM name=emailform method=post action="" ONSUBMIT='return noEntry()';>





<table border=0>
<tr><td><b>Name</b><span class=red>*</span>:</td><td>
<input type=text name=myname value="<?echo "$myname";?>"></td></tr>
<tr><td><b>E-mail</b><span class=red>*</span>:</td><td>
<input type=text name=myemail value="<?echo"$myemail";?>"></td></tr>
<tr><td><b>Phone</b><span class=red>*</span>:</td><td>
<input type=text name=myphone value="<?echo"$myphone";?>"></td></tr>
<tr><td><b>Subject</b><span class=red>*</span>:</td><td>
<textarea name=subject rows=3 cols=25><?echo"$subject";?></textarea></td></tr>
</table>

<p align=center><input type=hidden value='<?echo"$passid";?>' name=passid>





<h3>Please fill out the following two words to send your message.</h3>



<?
require_once('../library/recaptchalib.php');

$publickey = "6LevZQQAAAAAAJEqU-uZkXhmJ91LleW7yNL7GFh2"; // you got this from the signup page

$privatekey = "6LevZQQAAAAAAEJJTuNdCGu8VeyYwxNu95oeYzCR"; // you got this from the signup page

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

$attempt = 0;

if ($_POST["submit"]) {

  $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);


$attempt = $attempt + 1;

if($resp->is_valid){


$subject=$_POST['subject'];
$myname=$_POST['myname'];
$myemail=$_POST['myemail'];
$myphone=$_POST['myphone'];
$passid=$_POST['passid'];

$message = "Website message from $myname...\r\n\r\n$subject";
$ip = $_SERVER['REMOTE_ADDR'];

$trans["\n"] = " "; 
$trans["\r"] = " "; 
$subject = strtr($subject,$trans); 

  	 if ($myname == "" || $myname== null)  {
	die ("<div id=successdiv><span class=red>Note: enter your name.  <a href=javascript:history.go(-1)>Go back...</a></span></div>");	    
	}


  	if ($myemail == "" || $myemail== null)  {
	die ("<div id=successdiv><span class=red>Note: enter your email.  <a href=javascript:history.go(-1)>Go back...</a></span></div>");	    
	}


if (isset($passid) && ($passid !=="")) 
		{
	 include ("../codes/adminconfig.php"); $dbmember = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querymember= "SELECT * FROM directory where id='$passid'"; $sql_resultmember = mysql_query($querymember, $connection) or die ("Couldn't execute query. Please try again later"); while ($myrow = mysql_fetch_array($sql_resultmember)) {                   $firstnamemember=$myrow["firstname"];                   $lastnamemember=$myrow["lastname"];                   $emailmember=$myrow["email"];		$to = "$emailmember";
						}
		}


	else {
		$to = "mbennjr@mac.com";
		$titlestaff = "General Mailbox";
		}

$dategenerated = date("F j, Y, g:i a");  
$browser= $_SERVER['HTTP_USER_AGENT'];


			$from = "From: $myname <$myemail>";
			$ip = $_SERVER['REMOTE_ADDR'];
			$message = "Website message from $myname...\r\n\r\nSENT USING THE E-mail FORM via the Member Directory\r\n\r\nSUBJECT: $subject\r\nPHONE: $myphone\r\nE-MAIL: $myemail\r\n\r\n\r\n\r\nIP address of computer from which this e-mail was sent: $ip\r\nBROWSER: $browser\r\nGenerated: $dategenerated\r\n";


			mail($to, "Message sent via the website $basewebsite", $message, $from);
echo "<h2>Thank you! Your mail was sent.</h2> This member will contact you directly if you have requested more information.<BR><BR>Back to <a href=/>homepage</a>.<BR clear=all>";

}

else if (!$resp->is_valid) {
    # set the error code so that we can display it. You could also use
    # die ("reCAPTCHA failed"), but using the error message is
    # more user friendly
    $error = $resp->error;
echo "<span class=redbackground>That entry is not accepted! Please try again.</span><BR>";
echo recaptcha_get_html($publickey, $error);
echo "<input type=submit value=submit name=submit></p>";
echo "</form>";
}



}

if ($attempt == "0") {
echo recaptcha_get_html($publickey, $error);
echo "<input type=submit value=submit name=submit></p>";
echo "</form>";
}

?>






<a href=/pages/privacy.php>Privacy Policy</a><BR>
<BR clear=all>

</div>

<?



}


?>


<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>