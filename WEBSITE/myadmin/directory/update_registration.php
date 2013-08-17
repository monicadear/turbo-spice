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
<? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><BR><table border=1 cellpadding=0 cellspacing=0 width=90% align=left><? echo "<form method='post' action='update_handler_registration.php'>"; ?> <?$db = "directory";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";

$description= $row->description;
$description = strtr($description,$trans);

$website = $row->website;
$transweb["http://"] = "";$website = strtr($website, $transweb);

  echo "<tr>";    echo "<th width=20%>Full Name</th><td>First: <input type=text name='firstname' value='$row->firstname' size=15> &nbsp; Last: <input type=text name='lastname' value='$row->lastname' size=15></td></tr>\n";    echo "<tr><th>Company</th><td><input type=text name='company' value='$row->company'></td></tr>\n";    echo "<tr><th>BIZ Address</th><td><input type=text name='address' value='$row->address'></td></tr>\n";    echo "<tr><th>BIZ City-State-Zip</th><td>City: <input type=text name='city' value='$row->city' size=15> State:<input type=text name='state' value='$row->state' size=5> &nbsp; Zip: <input type=text name='zip' value='$row->zip' size=10></td></tr>\n";    echo "<tr><th>BIZ:</th><td>Phone: <input type=text name='company_phone_number' value='$row->company_phone_number' size=21>  <i>format: 510-333-1234</i><BR>\n";
echo "Fax: <input type=text name='company_fax_number' value='$row->company_fax_number' size=21><BR>\n";
echo "</td></tr>\n";

    echo "<tr><th>Website</th><td><input type=text name='website' value='$website' size=50> <i>format: www.yoursite.com</i></td></tr>\n";    echo "<tr><th>Email</th><td><input type=text name='email' value='$row->email'></td></tr>\n";    echo "<tr bgcolor=#CCFFFF><th><font color=red>Last Paid Date</font></th><td>";

$lastpaiddate=$row->lastpaiddate;

if ($lastpaiddate == "" || $lastpaiddate==null) {

$lastpaiddatemonth=date(m);
$lastpaiddateday=date(d);
$lastpaiddateyear=date(Y);
$lastpaiddateyear= substr("$lastpaiddateyear", 2, 4);

$lastpaiddate=$lastpaiddatemonth."/".$lastpaiddateday."/".$lastpaiddateyear;

}

else {
	$lastpaiddate=$row->lastpaiddate;
}

echo "<input type=text name='lastpaiddate' value=''> you may use: <b>$lastpaiddate</b> <i>format: M/D/YY</i> </td></tr>";

    echo "<tr><th>Member Since</th><td><input type=text name='membersince' value='$row->membersince'> <i>format: YYYYMM</i></td></tr>";    echo "<tr><th>Valid Until</th><td><input type=text name='validuntil' value='$row->validuntil'> <i>format: YYYYMM</i></td></tr>";

    echo "<tr><th>Member Type</th><td>";


$typeofcontact = $row->typeofcontact;

echo "Currently listed as: <b>$typeofcontact</b><BR>\n";

echo "<select name=typeofcontact>";
include ("producttypelist_category.php");
echo "</select>";




echo "</td></tr>";

echo "<tr><th valign=top>Description</th><td><textarea name='description' id='description' rows=5 cols=60>";
echo "$description";echo "</textarea>
</td></tr>";




    echo "<tr><th>Publish to DIRECTORY?</th><td>";


$publish = $row->publish;

if ($publish=='Y' || $publish=='y') {echo "<input type=radio value=N name=publish> NO, not published<BR><input type=radio value=Y name=publish checked> <b>YES, PUBLISHED</b>\n";
} 

else if ($publish=='N'|| $publish=='n' || $publish=='') {echo "<input type=radio value=N name=publish checked> <b>NOT PUBLISHED.</b><BR><input type=radio value=Y name=publish> Click to publish.\n";
} 

else {  
echo "<select name=publish><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";
}
echo "&nbsp; &nbsp; &nbsp; &nbsp; ";
echo "DATE CREATED: $row->datecreated</td></tr>";$id = $row->id;}


echo "<tr><td colspan=2><input type=hidden name='id' value='$id'>";echo "<input type='submit' name='update' value='UPDATE record'></form>";
echo "</td></tr></table><p>";?>

<?mysql_free_result($db); mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
 ?>