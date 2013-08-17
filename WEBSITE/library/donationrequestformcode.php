<?

$attempt = "0";
$dateofsignature=date(Y)."-".date(M)."-".date(d);


$passid=$_REQUEST['passid'];

$subject=$_POST['subjecttext'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$myphone=$_POST['myphone'];
$myemail=$_POST['myemail'];$mailingaddress=$_POST['mailingaddress'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$donationrequest=$_POST['donationrequest'];
$quantity=$_POST['quantity'];
$daterequired=$_POST['daterequired'];
$numberimpact=$_POST['numberimpact'];


echo "<div align=right><a href=#top>top</a></div>\n";
echo "<a name=donationrequest></a>";
echo "<h2>Donation Request Form</h2>\n";
echo "<span class=small>Appendix Z</span><BR>\n";
echo "<BR>Send a message to: <b>CVSAN Donation Request Manager</b><BR>\n";

?>



<? include ("../library/mydonationrequestformcheck.php"); ?>




<?
  if ($attempt=="0") {
?>

<!-- beginning of contact form text -->
<FORM method=post action="" name="donateform" ONSUBMIT='return noEntry()';>
<table border=0 cellspacing=0 cellpadding=2>
<tr><th>Applicant Contact Name:</th><td><div align=right>First Name</div></td><td><input type=text name=firstname value="<?echo "$firstname";?>"><span class=red>* required</span></td></tr>
<tr><td></td><td><div align=right>Last Name</div></td><td><input type=text name=lastname value="<?echo "$lastname";?>"><span class=red>* required</span>
</td></tr>
<tr><th>Phone:</th><td></td><td><input type=text name=myphone value="<?echo"$myphone";?>" size=25><span class=red>* required</span> <em>(like 510-555-1234)</em></td></tr>
<tr><th>E-mail:</th><td></td><td><input type=text name=myemail value="<?echo"$myemail";?>" size=30><span class=red>* required</span></td></tr>

<tr><th>Mailing Address:</th><td><div align=right>Address</div></td><td><input type=text name=mailingaddress value="<?echo"$mailingaddress";?>" size=40><span class=red>* required</span></td></tr>
<tr><td></td><td><div align=right>City</div></td><td><input type=text name=city value="<?echo"$city";?>" size=20><span class=red>* required</span></td></tr>
<tr><td></td><td><div align=right>State</div></td><td><input type=text name=state value="<? if ($state=="") {$state="CA";} else {$state=$_REQUEST['state'];} echo"$state";?>" size=5><span class=red>* required</span></td></tr>
<tr><td></td><td><div align=right>Zip Code</div></td><td><input type=text name=zip value="<?echo"$zip";?>" size=5><span class=red>* required</span> </td></tr></table>




<table border=0 cellspacing=0 cellpadding=2><tr><td colspan=3>
<div align=left>
<iframe src ="/snippets/donationrequestformmissionvisionvalues.php" width="400" height="150" scrolling="yes">
  <p>
<? include ("../snippets/donationrequestformmissionvisionvalues.php"); ?>
</p>
</iframe>
</div>
<BR>

Please describe the purpose of the donation as it applies to the District's Mission Statement, Vision Statement and/or Strategic Goal. <span class=red>* required</span>:<BR>
<textarea name=subjecttext rows=3 cols=65><?echo"$subjecttext";?></textarea>
</td></tr>

<tr><td colspan=3>
Donation Request:<BR>
<input type=text name=donationrequest value="<?echo "$donationrequest";?>" size=65><span class=red>* required</span><BR>


Quantity: <input type=text name=quantity value="<?echo "$quantity";?>" size=3><span class=red>* required</span><BR>

Date Requested: <input type=text name=daterequired value="<?echo "$daterequired";?>"><span class=red>* required</span><BR>

Number of People Impacted: <input type=text name=numberimpact value="<?echo "$numberimpact";?>" size=5><span class=red>* required</span><BR>


</td></tr>

<tr><td colspan=3>Has the Castro Valley Sanitary District provided a donation for your organization in the past?<span class=red>* required</span><BR>
<input type=radio name=pastdonation value=Yes>Yes &nbsp; &nbsp; &nbsp; 
<input type=radio name=pastdonation value=No checked>No<BR>
If yes, what items, when and estimated value? <textarea name=detailspastdonation rows=3 cols=55><?echo "$detailspastdonation";?></textarea></td></tr>
	
<tr><td colspan=3>Additional information or comments:<BR>

<textarea name=additionalinfo rows=3 cols=45><?echo "$additionalinfo";?></textarea>
</td></tr></table>

<input type=hidden name=referer value='<?echo $PHP_SELF;?>'>
	
<BR><BR>


<input type="checkbox" name="q1" value="1"><span class=red>* required</span> The above information is correct to the best of my knowledge.  If the donation is approved, I will use the donated goods for the purposes listed above.  I have read and accept the District's Donation Policy No. 3095.<BR><BR>


			
Signature <input type=text name=signature value=<? echo "$signature";?>> 
Date <input type=text name=dateofsignature value='<? echo "$dateofsignature";?>'><BR>

<BR><BR>

I have received all items outlined in this Donation Request Form.<BR>
Signature <input type=text name=signature2 value=<? echo "$signature2";?>> 
Date <input type=text name=datereceived value='<? echo "$datereceived";?>'><BR>

<BR><BR>
NOTE: Donation Request Forms/Supporting Documentation can be mailed or faxed to CVSD at 510-537-1312<BR><BR>



<?
}
else {
echo "";
}?><?require_once('../library/recaptchalib.php');$publickey = "6LfUeAUAAAAAADqlZDbsidbX8siFGDINZ-OsSCSQ"; // you got this from the signup page$privatekey = "6LfUeAUAAAAAANXY_LWnBmzv8VwcY4gSa6-reefw"; // you got this from the signup page# the response from reCAPTCHA$resp = null;# the error code from reCAPTCHA, if any$error = null;



# are we submitting the page?if ($_POST["submit"]) {  $resp = recaptcha_check_answer ($privatekey,                                  $_SERVER["REMOTE_ADDR"],                                  $_POST["recaptcha_challenge_field"],                                  $_POST["recaptcha_response_field"]);

// just in case you need to hide after x amount of attempts, keep a counter 
$attempt = $attempt + 1;


/// the recaptcha was correct, so send an e-mail
  if ($resp->is_valid) {$referer=$_POST['referer'];if (isset($referer) && $referer=="") {$referer="DonationRequestForm";}$subject=$_POST['subjecttext'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$myphone=$_POST['myphone'];
$myemail=$_POST['myemail'];$mailingaddress=$_POST['mailingaddress'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$donationrequest=$_POST['donationrequest'];
$quantity=$_POST['quantity'];
$daterequired=$_POST['daterequired'];
$numberimpact=$_POST['numberimpact'];



$pastdonation=$_POST['pastdonation'];
$detailspastdonation =$_POST['detailspastdonation'];


$additionalinfo=$_POST['additionalinfo'];

$signature=$_POST['signature'];
$dateofsignature=$_POST['dateofsignature'];

$signature2=$_POST['signature2'];
$datereceived=$_POST['datereceived'];


$passemailto=$_POST['passemailto'];
$ip = $_SERVER['REMOTE_ADDR'];$browser= $_SERVER['HTTP_USER_AGENT'];


$trans["\n"] = " "; 
$trans["\r"] = " "; 
$subject = strtr($subject,$trans); 



$to = "contact@cvsan.org";

$titlestaff = "CVSAN.org DONATION REQUEST FORM";

$dategenerated= date(M)." ".date(d)." ".date(Y);$message = "NAME: $firstname $lastname\rPHONE: $myphone\rE-MAIL: $myemail\r

ADDRESS: $mailingaddress\r
$city $state $zip\r\n

PURPOSE OF DONATION: $subject\r\n

DONATION REQUEST:\r
Details: $donationrequest\r\n
Quantity: $quantity\r\n
Date Required: $daterequired\r\n
Number to be impacted $numberimpact\r\n

PAST DONATION? $pastdonation\r\n
DETAILS, if ANY: $detailspastdonation


ADDITIONAL INFO: $additionalinfo\r\n

SIGNED: $signature\r\n
DATE of SIGNATURE: $dateofsignature\r\n


RECEIVED? $signature2\r\n
DATE OF SIGNATURE CONFIRMING RECEIPT: $datereceived\r\n
---- END OF GENERATED FORM ----Sent from: $referer\r\nThis form was sent from IP address: $ip\r\nBrowser: $browser\r\nPlease do not respond. This is an auto-generated e-mail.Date sent: $dategenerated\r\n

**********************
For CVSD Office Use Only:\r
___ Approved\r
___ Rejected\r

Reason (if rejected): \r
By: \r
Signature: \r
\r\n

Board Approval Required:
___ Yes\r
___ No\r
Board Meeting Date: \r

Written Response Sent:\r
By: \r
Date: \r
Via (i.e. fax, email): \r



";
$subjecttosend="DONATION REQUEST FORM MESSAGE from $nameoforg";

$from = "From: $firstname $lastname <$myemail>";mail($to, $subjecttosend, $message, $from);echo "<div id=formsuccess>";
echo "<h2>Donation Request Form Submitted!</h2>\n\n";echo "Thank your for your submission!<BR><BR>\n\n";
echo "Your donation request form has been submitted, and we will respond to the contact information you listed. If you have any questions about the process, please contact us through our website, via phone, or by e-mail.<BR><BR>\n";
echo "We look forward to being of service to you.<BR><BR>";echo "Sincerely,<BR>\n";echo "The Castro Valley Sanitary District<BR><BR>\n\n";echo "<a href=/>Return to the homepage...</a>";
echo "</div>";
}
else if (!$resp->is_valid) {
    # set the error code so that we can display it. You could also use
    # die ("reCAPTCHA failed"), but using the error message is
    # more user friendly
    $error = $resp->error;

// just in case you need to hide after x amount of attempts, keep a counter 
$attempt = $attempt + 1;

echo "<div id=formsuccess><span class=redbackground>That entry is not accepted! Please scroll down and try again.</span><BR></div>";
}



}

echo recaptcha_get_html($publickey, $error);
echo "<input type=submit value=submit name=submit></p>";
echo "</form>";

?>
