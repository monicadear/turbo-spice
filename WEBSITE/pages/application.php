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



<SCRIPT LANGUAGE="JavaScript">

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


<SCRIPT LANGUAGE="JavaScript">

function isValidEmail(str) {

   return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
 
}
-->
</script>


<SCRIPT LANGUAGE="JavaScript">

function isValidLink(str) {

   return (str.indexOf("http") > 2) && (str.indexOf("www") > 0);
 
}
-->
</script>

      else if (document.appform.state.value.length<1) {
      else if (document.appform.zip.value.length<1) {
      else if (document.appform.company_phone_number.value.length<1) {

else if (document.appform.bio.value.indexOf("http") > 0 ||
document.appform.bio.value.indexOf("www") > 0 ||
document.appform.bio.value.indexOf("href") > 0 ||
document.appform.bio.value.indexOf(".com") > 0 ||
document.appform.bio.value.indexOf(". com") > 0 ||
document.appform.bio.value.indexOf(".net") > 0 ||
document.appform.bio.value.indexOf(". net") > 0 ||
document.appform.bio.value.indexOf(".org") > 0 ||
document.appform.bio.value.indexOf(". org") > 0 ) {
alert("We cannot accept links. Please fill out a regular description.");


      else if (document.appform.email.value.length<1) {
<div align=left><a href=/>Back to HOMEPAGE</a></div>
<h1>Membership Interest Form</h1>
You may also download and send a <a href=/downloads/membershipapplication.pdf>print version (PDF)</a>.</div>



<?
require_once('../library/recaptchalib.php');
$publickey = "XXXXXXXXXXXXXXX"; // you got this from the signup page
$privatekey = "XXXXXXXXXXXXXXXXXX"; // you got this from the signup page

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

?>


<tr><th>Please add a brief biography<span class=red>*</span></th><td valign=top><textarea name=bio rows=3 cols=35>
<?echo"$bio";?> 
</textarea>
</td></tr>
<tr><th>Web Site </th><td><input type=text name=website value="<?echo"$website";?>" size=40></td></tr>
<tr><th>E-mail<span class=red>*</span></th><td><input type=text name=email value="<?echo"$email";?>" size=40></td></tr>
<tr><th>Membership $50 (suggested)</th><td>


<select name="typeofcontact"><option></option>


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


$firstname=$_POST['firstname'];
$company=$_POST['company'];

$website=$_POST['website'];
$bio=$_POST['bio'];
$typeofcontact=$_POST['typeofcontact'];
$ip = $_SERVER['REMOTE_ADDR'];
$transweb["http://"] = "";




$city=$_POST['city'];



$message = "ONLINE INTEREST FORM -----------\r\n\r\nThis online membership interest form was submitted through the website. \r\nThe application is NOT YET COMPLETE!\r\n\r\nTo complete the application, the applicant should make a payment.\r\n\r\n + If they have already made a payment, you will receive an e-notification.\r + If you have not received an e-notification, follow up with this applicant directly or encourage them to use the credit card link on the website.\r\n\r\n\r\n\r\n

Their information was automatically added to the online directory but they have not yet been PUBLISHED. $websitefullurl/pages/directory.php. \r\n\r\nWhen you receive their payment, publish their information:\r\n $websitefullurl/admin/directory/registrationadmin_all.php  (copy and paste into new window)\r\n\r\nYou may also PRINT OUT a MEMBER APPLICATION FORM FOR THEM here:\r\n $websitefullurl/admin/directory/print_registrationlastname.php?lastname=$lastname\r\n\rName: $firstname $lastname\r\nCompany: $company\r\nAddress: $address\r\nCity-State-Zip: $city $state $zip\r\n\r\nPhone: $company_phone_number\r\nFax: $company_fax_number\r\nEmail: $email\r\nWebsite: $website\r\n

Type of contact: $typeofcontact\r\n

Include name in  roster? $includeinroster\r
Willing to volunteer time? $volunteertime\r

Types of projects: $interestedin\r\n
Would like to see  provide the following: $requestedservices\r\n



Description: $bio\r\nIP:$ip";
$to = "monica@10kgroup.com";

$from = "From: $firstname $lastname <$email>";


mail($to, $subject2, $message, $from);






$todaysdate=date(Ymdhis);

$from2 = "From: $nameoforg <NOSPAM-$todaysdate@>";
$subject3="Welcome to the Website";


\r\n



 mail($email, $subject3, $message2, $from2);












$organizationmailingaddress="California Straw Building Association<BR>
P.O. Box 1293<BR>
Angels Camp, CA 95222-1293<BR>
Phone: 209-785-7077";

echo "<div id=topofpagediv>$firstname, APPLICATION SUBMITTED!<BR><BR>";
echo "STEP 1 - Fill out Form &nbsp; &#124; &nbsp; <font color=red>STEP 2 - Pay</font><BR><BR><BR>";

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







<input type=submit value='next step' name=submit>

<div align=left><a href=/pages/privacy.php class=lightblue>Privacy Policy</a></div>

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>