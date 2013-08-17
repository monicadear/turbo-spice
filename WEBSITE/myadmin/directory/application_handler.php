<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?>

<?$firstname=$_POST['firstname'];

$lastname=$_POST['lastname'];$company=$_POST['company'];$address=$_POST['address'];$city=$_POST['city'];$state=$_POST['state'];$zip=$_POST['zip'];$company_phone_number=$_POST['company_phone_number'];$company_fax_number=$_POST['company_fax_number'];$website=$_POST['website'];$email=$_POST['email'];$bio=$_POST['bio'];$typeofcontact=$_POST['typeofcontact'];

$publish=$_POST['publish'];


$transweb["http://"] = "";$website = strtr($website, $transweb);
$membersince=date(Y).date(m);$validdateyear=date(Y)+1;$validuntil=$validdateyear.date(m);$today=date(Ymdhis);include ("../../codes/adminconfig2.php");$db = mysql_select_db($database, $connection) or die ("Couldn't select database. Try again."); 

$sql = "insert into directory values ('','$today','$firstname','$lastname','$company','$address','$city','$state','$zip','$company_phone_number','$company_fax_number','','','','','','','$email','$website','','CASBA','$today','$today','$validuntil','Y','$today','$bio','imgcomingsoon.jpg','$typeofcontact')"; 
$sql_result = mysql_query($sql, $connection) or die (""); mysql_close();



?>


<?echo "<BR>";echo "<b><font color=red>Success!</font></b> The member <b>$firstname $lastname</b> has been added to the directory.<BR>";echo "Return to the member directory <a href=registrationadmin_all.php>administration page</a>.";?>
<? include ("../adminfooter.php"); ?>

<? }
 ?>