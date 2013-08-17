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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?>

<BR><BR><table border=0 cellpadding=0 cellspacing=0 width=650><tr><td colspan=2><img src=/images/logo.jpg alt=logo align=left height=35 hspace=8><font size=+2>Membership Application</font></td></tr><?$db = "directory";$query1 = "select * from $db where lastname = '$lastname' limit 1";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";

$description = $row->description;

$description = strtr($description,$trans);     echo "<tr><td width=50%><b>Name:</b> &nbsp; &nbsp; $row->firstname $row->lastname</td>";    echo "<td><b>Company Name:</b> &nbsp; &nbsp; $row->company</td></tr>";echo "<tr><td colspan=2><hr></td></tr>";    echo "<tr><td colspan=2><b>Company Address:</b>  &nbsp; &nbsp; $row->address</td></tr>";echo "<tr><td colspan=2><hr></td></tr>";    echo "<tr><td colspan=2><b>City/State/Zip:</b>  &nbsp; &nbsp; $row->city, $row->state $row->zip</td></tr>";echo "<tr><td colspan=2><hr></td></tr>";    echo "<tr><td><b>Phone:</b> &nbsp; &nbsp; $row->company_phone_number</td><td><b>Fax:</b>  &nbsp; &nbsp; $row->company_fax_number</td></tr>";echo "<tr><td colspan=2><hr></td></tr>";echo "<tr><td colspan=2><hr></td></tr>";    echo "<tr>";
    	echo "<td><b>Web Site:</b>  &nbsp; &nbsp; $row->website</td>";
	echo "<td><b>Email:</b>  &nbsp; &nbsp; $row->email</td>";echo "</tr>";echo "<tr><td colspan=2><hr></td></tr>";        echo "<tr><td><b>Type of membership held:</b></td><td>&nbsp; &nbsp; <u>$row->typeofcontact</u></td></tr>";echo "</table><BR>";
}

?><b>DUES AMOUNT OWED</b><BR><table width=500 border=0><tr><td>TOTAL DUES:</td><td>   </td></tr></table><BR><b>METHOD OF DUES PAYMENT</b><BR><input type=checkbox name=duespayment value=checkfor> Check for $_____ is enclosed.<BR><input type=checkbox name=duespayment value=checkfor> Charge $_____ to my Visa &#124; MasterCard &#124; American Express &#124; Diners Club &#124; Discover<BR>Credit card# ___________________________ Expiration________________<BR>Signature: ________________________________________________________<BR><BR><table width=600><tr><td bgcolor=#CCCCCC valign=top width=320><b>FOR ADMIN USE ONLY</b><BR><span class=smaller>Verify all information, dues amounts and payment information before forwarding this application.<BR>SPONSORED By Organization<BR>Application process completed by _______________<BR>Date ___________________________</span></td><td valign=top><span class=smaller>Please send completed applicationalong with payment to:<BR> Membership Coordinator</span></td></tr></table>

<? include ("../adminfooter.php"); ?>

<? }
 ?>