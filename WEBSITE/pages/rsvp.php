<?
/**
 * rsvp.php
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



<SCRIPT LANGUAGE="JavaScript">
<!--
function noEntry() {
if (document.rsvppp.firstname.value.length<1) {
alert("Please fill in your first name.");
return false; }
else if (document.rsvppp.lastname.value.length<1) {
alert("Please fill in your last name.");
return false; }

	else if (document.rsvppp.lastname.value==document.rsvppp.firstname.value) {
alert("Please fill in your real name.");
		return false; }

else if (document.rsvppp.email.value.length<1) {
alert("Please fill in your email so we may confirm your participation. We keep your information private.");
return false; }
else { return true; }
}
// -->
</SCRIPT>



<?
$titlepass=$_REQUEST['titlepass'];
$locationpass=$_REQUEST['locationpass'];
$starttimepass=$_REQUEST['starttimepass'];
$endtimepass=$_REQUEST['endtimepass'];

$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];


$title=urldecode($titlepass);
$starttime=urldecode($starttimepass);
$endtime=urldecode($endtimepass);
$location=urldecode($locationpass);
$price=$_REQUEST['price'];
$pricenonmembers=$_REQUEST['pricenonmembers'];

?>

<div id=calendareventleft>

<?
echo "<b>Event:</b> <b><i>$title</i></b><BR>";
echo "<b>Date:</b> $startdate ";

if (isset($enddate) && $enddate !=="") {
echo "through $enddate";
}


echo "<BR>";


if (isset($starttime) && ($starttime !=="")) {
echo "$starttime ";
}
else {
}


if (isset($endtime) && ($endtime !=="")) {
echo "to $endtime<BR>";
}
else {
}




if (isset($location) && ($location !=="")) {
echo "<BR><b>Location:</b> $location<BR>";
}
else {
}


if (isset($price) && ($price !=="")) {
echo "<BR><b>Price:</b> $$price<BR>";
}
else {
}

if (isset($pricenonmembers) && ($pricenonmembers !=="")) {
echo "Price non-members: $$pricenonmembers<BR>";
}
else {
}



?>
</div>
<BR clear=all>



<h1>Let us know if you're attending...</h1>

<h2><? echo "$title";?></h2>
<!--- text goes here -->

<?php $passit=$id."_".$startdate;  ?>


<div id=indent>

 <FORM method=post name=rsvppp action="" onsubmit="return noEntry()">


<?
require_once('../library/recaptchalib.php');
$publickey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"; // you got this from the signup page
$privatekey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"; // you got this from the signup page

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

?>


<table border=0 width=100%>
<tr><td width=45%><div align=right><span class=smaller><b>First Name:</b></span><span class=red>*</span></div></td><td><input type ="text" name="firstname" rows="1" value="<?php echo $firstname ?>" size="15"></td></tr>
<tr><td><div align=right><span class=smaller><b>Last Name:</b></span><span class=red>*</span></div></td><td><input type ="text" name="lastname" rows="1" value="<?php echo $lastname ?>" size="15"></td></tr>
<tr><td><div align=right><span class=smaller><b>E-mail:</b></span><span class=red>*</span></div></td><td><input type ="text" name="email" rows="1" value="<?php echo $thisemail ?>" size="15"></td></tr>
<tr><td><div align=right>Contact Phone:</div></td><td>
(<input type ="text" name="phone_area" rows="1" value="<?php echo $phone_area ?>" size="3">) <input type ="text" name="phone_number" rows="1" value="<?php echo $phone_number ?>" size="8"></td></tr>
<tr><td><div align=right>Address:</div></td><td><input type ="text" name="address" rows="1" value="<?php echo $address ?>" size="15"></td></tr>
<tr><td><div align=right>City:</div></td><td><input type="text" name="city" value="<?php echo $city ?>" size="15"></td></tr>
<tr><td><div align=right>State:</td><td><input type="text" name="state" value="<?echo $state ?>" size="5"></td></tr>
<tr><td><div align=right>ZIP code:</div></td><td><input type ="text" name="zip" rows="1" value="<?php echo $zip ?>" size="10"></td></tr>
<tr><td valign=top><div align=right>Comments or questions:</div></td><td>
<textarea name="text" rows="3" cols="20"><?php echo $text ?></textarea></td></tr>
<tr><td colspan=2><input type="hidden" name="idnumber" value="<?php echo $passit ?>">
<input type="hidden" name="title" value="<?php echo $titlepass ?>">
<input type="hidden" name="startdate" value="<?php echo $startdate ?>">
<input type="hidden" name="starttime" value="<?php echo $starttimepass ?>">
<input type="hidden" name="endtime" value="<?php echo $endtimepass ?>">
<input type="hidden" name="location" value="<?php echo $locationpass ?>">
<input type="hidden" name="price" value="<?php echo $price ?>">
<input type="hidden" name="pricenonmembers" value="<?php echo $pricenonmembers ?>">
<!-- <BR><BR>If this is a paid event, you will have a chance to pay after you press "submit".-->
<BR>
<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->

<!-- ------------------ -->









<?
# are we submitting the page?
if ($_POST["submit"]) {
  $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

  if ($resp->is_valid) {

$referer=$_POST['referer'];
if (isset($referer) && $referer=="") {
$referer="rsvp.php";
}



$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$email=$_POST['email'];
$phone_area=$_POST['phone_area'];
$phone_number=$_POST['phone_number'];
$text=$_POST['text'];
$idnumber=$_POST['idnumber'];
$title=$_POST['title'];
$startdate=$_POST['startdate'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$location=$_POST['location'];
$price=$_POST['price'];
$pricenonmembers=$_POST['pricenonmembers'];

$date = date("YmdHis");
$firstname = htmlspecialchars("$firstname", ENT_QUOTES);
$lastname = htmlspecialchars("$lastname", ENT_QUOTES);
$address = htmlspecialchars("$address", ENT_QUOTES);
$city = htmlspecialchars("$city", ENT_QUOTES);
$phone_area = htmlspecialchars("$phone_area", ENT_QUOTES);
$phone_number = htmlspecialchars("$phone_number", ENT_QUOTES);
$text = htmlspecialchars("$text", ENT_QUOTES);
$text = ereg_replace("\r\n\r\n", "<BR><BR>\n", $text);
$text = ereg_replace("\r\n", "<BR>\n", $text);
$trans["javascript"] = "j_script";
$trans["input"] = "input_";
$trans["delete"] = "delete_";
$text = strtr($text,$trans); 

$title=urldecode($title);
$starttime=urldecode($starttime);
$endtime=urldecode($endtime);
$location=urldecode($location);


if ($email=="" || $email == null ) {
$email ="NOEMAIL@NOEMAIL.com";
}


$ip = $_SERVER['REMOTE_ADDR'];
$subject = "WEBSITE RSVP $title";
$from = "From: $firstname $lastname <$email>";
$message = "The following individual has RSVPed for an event. This message is just for your information.\r\n\r\nHere is their contact information:\r\n\r\nEVENT: $title\r\nDATE: $startdate\r\nName: $firstname $lastname\r\nAddress: $address\r\nCity-State-Zip: $city, $state $zip\r\n\r\nEmail: $email\r\n\r\nPhone: $phone_area $phone_number\r\n\r\nText: $text\r\n\r\n\r\nIP address=$ip\r\n\r\n\r\n";

$to = "$to";


mail($to, $subject, $message, $from);

$exploded=explode("_", $idnumber);
$idnumberforconfirmation=$exploded[0]; // piece1
$dateofeventforconfirmation=$exploded[1]; //all other pieces

$to2 = "$email";
$subject2 = "WEBSITE CONFIRMATION";
$from2 = "From: Webmaster <NOSPAM>";
$message2 = "Thank you for indicating your interest in this event!\r\n
Event: $title\r
Date: $dateofeventforconfirmation\r
Time: $starttime to $endtime\r
Location: $location\r\n
We look forward to seeing you at the event!\r\n

NOTE: If our organization is sponsoring this event and it is a paid event, please make your payment.\r\n

Please visit our online calendar for changes, announcements and scheduling information.\r\n
$basewebsite/pages/main.php?pageid=13&pagecategory=4


PAYMENT OPTIONS***************\r\n
If you have not already done so and if there is a cost associated with this event, please make your payment. \r\n

MEMBERS:  $$price\r\n
VISITORS: $$pricenonmembers\r
MEMBERS:  $$price\r<https://www.paypal.com/xclick/business=info%40$emailstub&item_name=FEE&item_number=$startdate&amount=$price&shipping=0&no_shipping=1&cn=Comments%2C+questions%2C+feedback%3A&currency_code=USD&no_note=0>\r\n\r\nVISITORS: $$pricenonmembers\r<https://www.paypal.com/xclick/business=info%40$emailstub&item_name=FEE&item_number=$startdate&amount=$pricenonmembers&shipping=0&no_shipping=1&cn=Comments%2C+questions%2C+feedback%3A&currency_code=USD&no_note=0>\r\n


Many thanks,\r\n
$nameoforg";
mail($to2, $subject2, $message2, $from2);


echo "<div id=topofpagediv><b>$firstname, THANK YOU FOR RSVP'ing!</b><BR><BR>";

echo "<img src=/images/rsvp.gif border=0 alt=rsvp hspace=2 width=25 align=left hspace=3><span class=redsuccess>THANK YOU!</span><BR><BR>";
echo "Your RSVP has been sent to our group coordinator.<BR><BR>";

if ($price >"0") { 

echo "<B>YOU'RE NOT YET FINISHED!</B><BR>";

echo "Send your payment $$price made out to<BR>
$organizationmailingaddress</span><BR><BR>";


echo "Once you have made your payment, an organizer will contact you.<BR><BR>";


}

else {
echo "<b>No cost for this event.</b><BR><BR>";
}

echo "<hr>";



echo "<BR><BR>";



echo "<div id=calendareventbox>";
echo "Add this event to your calendar!<BR>";
echo "<h2>THANK YOU! We look forward to seeing you.</h2>";
echo "</div>";



echo "You have been e-mailed a reminder. Thank you for supporting us!<BR>";
echo "(<a href=/>back to home)</a><BR><BR>";

echo "</div>";


  } else {
    # set the error code so that we can display it. You could also use
    # die ("reCAPTCHA failed"), but using the error message is
    # more user friendly
    $error = $resp->error;
  }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>







<input type=submit value='next step' name=submit></form><BR>
</td></tr></table>



<div align=left><a href=/pages/privacy.php class=lightblue>Privacy Policy</a></div>




</div>
<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>


<?
unset($title);
unset($titlepass);
unset($startdate);
unset($starttime);
unset($starttimepass);
unset($endtime);
unset($endtimepass);
unset($location);
unset($locationpass);


?>


<?php include ("../library/myfooter.php"); ?>