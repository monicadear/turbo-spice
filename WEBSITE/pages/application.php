<?
/**
 * application.php
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



<SCRIPT LANGUAGE="JavaScript"><!--

function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }


-->
</script>


<SCRIPT LANGUAGE="JavaScript"><!--

function isValidEmail(str) {

   return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
 
}
-->
</script>


<SCRIPT LANGUAGE="JavaScript"><!--

function isValidLink(str) {

   return (str.indexOf("http") > 2) && (str.indexOf("www") > 0);
 
}
-->
</script>
<SCRIPT LANGUAGE="JavaScript"><!--function noEntry() {if (document.appform.firstname.value.length<1) {     alert("Please fill in your first name.");		return false; }   else if (document.appform.lastname.value.length<1) {     alert("Please fill in your last name.");		return false; }      else if (document.appform.city.value.length<1) {     alert("Please fill in your city.");		return false; }
      else if (document.appform.state.value.length<1) {     alert("Please fill in your state.");		return false; }
      else if (document.appform.zip.value.length<1) {     alert("Please fill in your zip code.");		return false; }
      else if (document.appform.company_phone_number.value.length<1) {     alert("Please fill in the best phone number to reach you.");		return false; }

else if (document.appform.bio.value.indexOf("http") > 0 ||
document.appform.bio.value.indexOf("www") > 0 ||
document.appform.bio.value.indexOf("href") > 0 ||
document.appform.bio.value.indexOf(".com") > 0 ||
document.appform.bio.value.indexOf(". com") > 0 ||
document.appform.bio.value.indexOf(".net") > 0 ||
document.appform.bio.value.indexOf(". net") > 0 ||
document.appform.bio.value.indexOf(".org") > 0 ||
document.appform.bio.value.indexOf(". org") > 0 ) {
alert("We cannot accept links. Please fill out a regular description.");return false; }


      else if (document.appform.email.value.length<1) {     alert("Please fill in your email. We keep your information private.");		return false; }      else if (document.appform.refers.value.length<1) {     alert("Please fill in your references.");		return false; }else { return true; }}// --></SCRIPT><div id=indent>
<div align=left><a href=/>Back to HOMEPAGE</a></div>
<h1>Membership Interest Form</h1><span class=red>Apply online!</span><BR>
You may also download and send a <a href=/downloads/membershipapplication.pdf>print version (PDF)</a>.</div>
 <FORM method=post name=appform action="" onsubmit="return noEntry()">


<?
require_once('../library/recaptchalib.php');
$publickey = "XXXXXXXXXXXXXXX"; // you got this from the signup page
$privatekey = "XXXXXXXXXXXXXXXXXX"; // you got this from the signup page

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

?>

<table border=0 width=95%><tr><th>First Name<span class=red>*</span></th><td><input type=text name=firstname value="<?echo"$firstname";?>" size=20></td></tr><tr><th>Last Name<span class=red>*</span></th><td><input type=text name=lastname value="<?echo"$lastname";?>" size=20></td></tr><tr><th>Business/Company</th><td><input type=text name=company value="<?echo"$company";?>" size=20></td></tr><tr><th>Mailing Address</th><td><input type=text name=address value="<?echo"$address";?>" size=20></td></tr><tr><th>City<span class=red>*</span></th><td><input type=text name=city value="<?echo"$city";?>" size=20></td></tr><tr><th>State<span class=red>*</span></th><td><input type=text name=state value="<?echo"$state";?>" size=20></td></tr><tr><th>Zip<span class=red>*</span></th><td><input type=text name=zip value="<?echo"$zip";?>" size=10></td></tr><tr><th>Phone<span class=red>*</span></th><td><input type=text name=company_phone_number value="<?echo"$company_phone_number";?>"  size=20></td></tr><tr><th>Fax </th><td><input type=text name=company_fax_number value="<?echo"$company_fax_number";?>" size=20></td></tr>
<tr><th>Please add a brief biography<span class=red>*</span></th><td valign=top><textarea name=bio rows=3 cols=35>
<?echo"$bio";?> 
</textarea>
</td></tr>
<tr><th>Web Site </th><td><input type=text name=website value="<?echo"$website";?>" size=40></td></tr>
<tr><th>E-mail<span class=red>*</span></th><td><input type=text name=email value="<?echo"$email";?>" size=40></td></tr>
<tr><th>Membership $50 (suggested)</th><td>


<select name="typeofcontact"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="membertype";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}?></select>


</td></tr>
<tr><td colspan=2><div id=indent2>

<div id=indent3>
All our members receive a membership roster. 
Can we include you? <input type="checkbox" name="includeinroster" value="yes"> yes<BR>
Are you willing to volunteer some of your time for  projects?
<input type="checkbox" name="volunteertime" value="yes"> yes<BR>




If so, what kind of projects would you be interested in?<BR>
<textarea name=interestedin rows=3 cols=40><?echo"$interestedin";?></textarea><BR>

</div>

What services would you like to see us provide?<BR>
<textarea name=requestedservices rows=3 cols=40><?echo"$requestedservices";?></textarea><BR><BR>

</div>

</td></tr>


</table>
<h3>Please fill out the following two words to process your application.</h3>






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
$referer="application.php";
}


$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];
$company=$_POST['company'];$address=$_POST['address'];$email=$_POST['email'];

$website=$_POST['website'];
$bio=$_POST['bio'];
$typeofcontact=$_POST['typeofcontact'];
$ip = $_SERVER['REMOTE_ADDR'];
$transweb["http://"] = "";$website = strtr($website, $transweb);




$city=$_POST['city'];$state=$_POST['state'];$zip=$_POST['zip'];$company_phone_number=$_POST['company_phone_number'];$company_fax_number=$_POST['company_fax_number'];



$message = "ONLINE INTEREST FORM -----------\r\n\r\nThis online membership interest form was submitted through the website. \r\nThe application is NOT YET COMPLETE!\r\n\r\nTo complete the application, the applicant should make a payment.\r\n\r\n + If they have already made a payment, you will receive an e-notification.\r + If you have not received an e-notification, follow up with this applicant directly or encourage them to use the credit card link on the website.\r\n\r\n\r\n\r\n

Their information was automatically added to the online directory but they have not yet been PUBLISHED. $websitefullurl/pages/directory.php. \r\n\r\nWhen you receive their payment, publish their information:\r\n $websitefullurl/admin/directory/registrationadmin_all.php  (copy and paste into new window)\r\n\r\nYou may also PRINT OUT a MEMBER APPLICATION FORM FOR THEM here:\r\n $websitefullurl/admin/directory/print_registrationlastname.php?lastname=$lastname\r\n\rName: $firstname $lastname\r\nCompany: $company\r\nAddress: $address\r\nCity-State-Zip: $city $state $zip\r\n\r\nPhone: $company_phone_number\r\nFax: $company_fax_number\r\nEmail: $email\r\nWebsite: $website\r\n

Type of contact: $typeofcontact\r\n

Include name in  roster? $includeinroster\r
Willing to volunteer time? $volunteertime\r

Types of projects: $interestedin\r\n
Would like to see  provide the following: $requestedservices\r\n



Description: $bio\r\nIP:$ip";$subject2 = "From $websitefullurl NEW APPLICATION from $firstname $lastname";
$to = "monica@10kgroup.com";

$from = "From: $firstname $lastname <$email>";


mail($to, $subject2, $message, $from);






$todaysdate=date(Ymdhis);

$from2 = "From: $nameoforg <NOSPAM-$todaysdate@>";
$subject3="Welcome to the Website";$message2="Thank you for your interest.\r\n\r\nYour application form has been submitted to the Membership Committee.\r\n\r\nPlease make sure you have made a payment online via credit card or make sure to send in your check.\r\n\r\nPAYMENT OPTIONS***************\r\nIf you have not already done so, please make your payment.\r\n
MEMBERSHIP:  $50\r\nPAY BY CHECK\r\nMake checks payable to $nameoforg and send to:\r\n$organizationmailingaddress

\r\nPAY ONLINE\r\nUse the link below to securely pay online using Mastercard, Visa, Amex or Discover:\r\nMEMBERS: $50\r\nhttps://www.paypal.com/xclick/business=services%40WEBSITE.ORG&item_name=MEMBERSHIP+FEE&item_number=APPLICATION&amount=50&shipping=0&no_shipping=1&cn=Comments%2C+questions%2C+feedback%3A&currency_code=USD&no_note=0\r\n\r\n\r\nThank you!\r\nSincerely,\r\nThe $nameoforg Team\r\n$websitefullurl\r\n\r\n\r\n\r\nThis message was automatically generated. If you need to contact us, please use our contact form from our website $websitefullurl\r\n\r\n";



 mail($email, $subject3, $message2, $from2);






include ("../codes/adminconfig.php");$db = mysql_select_db($database, $connection) or die ("Couldn't select database. Try again."); $membersince=date(Y).date(m);$validdateyear=date(Y)+1;$validuntil=$validdateyear.date(m);$today=date(Ymdhis);$sql = "insert into directory values ('','$today','$firstname','$lastname','$company','$address','$city','$state','$zip','$company_phone_number','$company_fax_number','$myhomeaddress','$myhomecity','$myhomestate','$myhomezip','$myhomephone_number','$myhomefax_number','$email','$website','$preference','$localchapter','$membersince','$lastpaiddate','$validuntil','N','$today','$bio', 'imgcomingsoon.jpg','$typeofcontact')"; 

$sql_result = mysql_query($sql, $connection) or die (""); mysql_close();



$organizationmailingaddress="California Straw Building Association<BR>
P.O. Box 1293<BR>
Angels Camp, CA 95222-1293<BR>
Phone: 209-785-7077";

echo "<div id=topofpagediv>$firstname, APPLICATION SUBMITTED!<BR><BR>";
echo "STEP 1 - Fill out Form &nbsp; &#124; &nbsp; <font color=red>STEP 2 - Pay</font><BR><BR><BR>";echo "<span class=redsuccess>THANK YOU!</span> <B>YOU'RE NOT YET FINISHED!</B> Please click the button below to pay your membership fee online.<BR><BR>

Or, send your payment made out to $nameoforg at $organizationmailingaddress</span><BR><BR>";

echo "<hr>";
echo "Membership: $50 includes credit card fee<BR>\n";

echo "<a href=https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=services%40WEBSITE.ORG%2eorg&item_name=Membership_Membership&item_number=Membership&amount=50&no_shipping=0&no_note=1&currency_code=USD&lc=US&bn=PP%2dBuyNowBF&charset=UTF%2d8><img src=/images/makeapayment1.jpg border=0></a><BR>";

echo "<BR><BR>";


echo "Once you have made your payment, a representative from our Membership committee will contact you.<BR><BR>";
echo "You have been e-mailed a reminder. Thank you for supporting us!<BR>";
echo "<a href=/>back to home)</a><BR><BR>";

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

<div align=left><a href=/pages/privacy.php class=lightblue>Privacy Policy</a></div>

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>