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

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$company=$_POST['company'];$address=$_POST['address'];$city=$_POST['city'];$state=$_POST['state'];$zip=$_POST['zip'];$company_phone_number=$_POST['company_phone_number'];$company_fax_number=$_POST['company_fax_number'];$website=$_POST['website'];$email=$_POST['email'];$lastpaiddate=$_POST['lastpaiddate'];

$membersince=$_POST['membersince'];$validuntil=$_POST['validuntil'];
$typeofcontact=$_POST['typeofcontact'];$publish=$_POST['publish'];$description=$_POST['description'];$firstname = htmlspecialchars("$firstname", ENT_QUOTES);$lastname = htmlspecialchars("$lastname", ENT_QUOTES);$address = htmlspecialchars("$address", ENT_QUOTES);$city = htmlspecialchars("$city", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);
$trans["javascript"] = "j_script";$trans["input"] = "input_";$trans["delete"] = "delete_";$text = strtr($text,$trans); 

$transweb["http://"] = "";$website = strtr($website, $transweb); include ("../../codes/adminconfig2.php"); $dateupdated=date(Ymdhis);
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="directory";$sql = "update $tablebase set dateupdated='$dateupdated', firstname='$firstname', lastname='$lastname', company='$company', address='$address', city='$city', state='$state', zip='$zip', company_phone_number='$company_phone_number', company_fax_number='$company_fax_number', website='$website', email='$email', membersince='$membersince', lastpaiddate='$lastpaiddate', validuntil='$validuntil', publish='$publish', description='$description', typeofcontact='$typeofcontact' 		  where id='$id'";
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query('$database',$query2);mysql_close();}?>
<? $today = date("Y-m"); ?><?echo "<p>Thanks for your update. Your changes have been made.";echo "<table width=100%>";echo "<tr><td width=15%><b>Name:</b></td><td>$firstname $lastname</td></tr>";echo "<tr><td><b>Address:</b></td><td>$address<BR>\n";echo "$city, $state, $zip</td></tr>";echo "<tr><td><b>E-mail:</b></td><td>$email</td></tr>";echo "<tr><td><b>Company Info:</b></td><td>$company<BR>$company_phone_number</td></tr>";echo "<tr><td><b>ID:</b></td><td>$id</td></tr>";echo "</table>";echo "<p align=center><font size=+2><a href=registrationadmin_all.php>view all...</a></p>";unset ($referred);unset ($date);unset ($firstname);unset ($lastname);unset ($address);unset ($city);unset ($state);unset ($zip);unset ($email);unset ($company_phone_number);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_free_result($db); mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
 ?>