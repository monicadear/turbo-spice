<?
/**
 * contactus.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: September 17, 2009 by Monica Flores 10kwebdesign
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

<h1>Contact Form</h1>
<div align=center>


<?
$passid=$_REQUEST['passid'];
$firstname=$_POST['firstname'];
$subjecttext=$_REQUEST['subjecttext'];



if (isset($passid) && ($passid !=="")) 

{
 include ("../codes/adminconfig.php"); 

$dbstaff = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$querystaff= "SELECT * FROM staff where aid='$passid'"; 
$sql_resultstaff = mysql_query($querystaff, $connection) or die ("Couldn't execute query. Please try again later"); 

while ($myrow = mysql_fetch_array($sql_resultstaff)){ 
                   $aid=$myrow["aid"];					   
                   $picturestaff=$myrow["picture"];
                   $firstnamestaff=$myrow["firstname"];
                   $lastnamestaff=$myrow["lastname"];
                   $titlestaff=$myrow["title"];
                   $emailstaff=$myrow["email"];

$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";
$textstaff = strtr($textstaff,$trans); 
$titlestaff = strtr($titlestaff, $trans);

echo "Send a message to: <b>$firstnamestaff $lastnamestaff</b>, <i>$titlestaff</i><BR>\n";

}


}

else 
{
echo "<BR>";
}

?>



<? include ("../library/mygeneralcontactformcheck.php"); ?>






<!-- beginning of contact form text -->
<table border=0>
<tr><th><b>First Name</b> <span class=red>*</span>:</th><td colspan=2><input type=text name=firstname value="<?echo "$firstname";?>"></td></tr>
<tr><th><b>Last Name</b> <span class=red>*</span>:</th><td colspan=2><input type=text name=lastname value="<?echo "$lastname";?>"></td></tr>
<tr><th><b>E-mail</b> <span class=red>*</span>:</th><td colspan=2><input type=text name=myemail value="<?echo"$myemail";?>"></td></tr>
<tr><th><b>Phone</b> <span class=red>*</span>:</th><td colspan=2><input type=text name=myphone value="<?echo"$myphone";?>"></td></tr>
<tr><th><b>Subject</b> <span class=red>*</span>:</th><td><textarea name=subjecttext rows=2 cols=30><?echo"$subjecttext";?></textarea></td><td><p align=center><input type=hidden name=ipaddress value='<?echo"$ip";?>'><input type=hidden name=aid value='<? echo"$aid";?>'><input type=hidden name=referer value=contactus.php></p></td></tr></table>


$attempt = 0;


# are we submitting the page?

// just in case you need to hide after x amount of attempts, keep a counter 
$attempt = $attempt + 1;


/// the recaptcha was correct, so send an e-mail
  if ($resp->is_valid) {
$passemailto=$_POST['passemailto'];



$trans["\n"] = " "; 
$trans["\r"] = " "; 
$subject = strtr($subject,$trans); 



if (isset($aid) && ($aid !=="")) 
{

}

}






else {
$to = "$to";
$titlestaff = "General Mailbox";
}



$from = "From: $firstname $lastname <$myemail>";
echo "</div>";
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


</div>

<a href=/pages/privacy.php>Privacy Policy</a><BR>



<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>