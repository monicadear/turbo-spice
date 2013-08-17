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
<? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><table width=100% border=0 cellspacing=5><tr><td valign=top><img src="/images/logo.jpg" alt="logo" border="0"></td><td><h1>Application Form</h1><span class=red>Enter new member online!</span><BR><a href=registrationadmin_all.php>See all members in the directory!</a><BR></td><td bgcolor=#FFFFCC> </td></tr></table><BR><div align=indent><table border=0 width=85%><tr><td valign=top><h2>Information about the new member...</h2> <FORM method=post action=application_handler.php><table width=95% border=0><tr><td width=100><div align=right>First Name</div></td><td><input type=text name=firstname value="<?echo"$firstname";?>" size=20></td></tr><tr><td><div align=right>Last Name</div></td><td><input type=text name=lastname value="<?echo"$lastname";?>" size=20></td></tr><tr><td><div align=right>Company Name, if any</div></td><td><input type=text name=company value="<?echo"$company";?>" size=20></td></tr><tr><td><div align=right>Company Address</div></td><td><input type=text name=address value="<?echo"$address";?>" size=20></td></tr><tr><td><div align=right>City</div></td><td><input type=text name=city value="<?echo"$city";?>" size=20></td></tr><tr><td><div align=right>State</div></td><td><input type=text name=state value="<?echo"$state";?>" size=20></td></tr><tr><td><div align=right>Zip</div></td><td><input type=text name=zip value="<?echo"$zip";?>" size=12></td></tr><tr><td><div align=right>Phone</div></td><td><input type=text name=company_phone_number value="<?echo"$company_phone_number";?>"  size=20></td></tr><tr><td><div align=right>Fax</div></td><td><input type=text name=company_fax_number value="<?echo"$company_fax_number";?>" size=20></td></tr>
<tr><td><div align=right>Please add a brief bio, describing your services in 5-7 sentences:</div></td><td valign=top><textarea name=bio rows=5 cols=35>
<?echo"$bio";?> 
</textarea>
</td></tr>
<tr><th>Web Site: </th><td><input type=text name=website value="<?echo"$website";?>" size=40></td></tr>
<tr><th>E-mail: </th><td><input type=text name=email value="<?echo"$email";?>" size=40></td></tr>

<tr><td><div align=right><b>Membership Type:</b></div></td><td><select name="typeofcontact"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="membertype";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}?></select> </td></tr>



</table></table></td><td></td></tr><tr><td colspan=2 valign=top>PUBLISH to DIRECTORY??<BR>
<input type=radio name=publish value=Y checked> Yes<BR><input type=radio name=publish value=N> No<BR></td><td valign=bottom><input type=submit value=submit name=submit></form><BR><div align=left><a href=/pages/privacy.php class=lightblue>Privacy Policy</a></div></td></tr></table><!-- end big table --><? include ("../adminfooter.php"); ?>

<? }
 ?>