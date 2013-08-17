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
<? include ("../adminnav.php"); ?><? include ("registration_nav.php"); ?><? include ("../../codes/adminconfig2.php"); ?><BR><table border=0 cellpadding=2 cellspacing=0 width="100%"><? echo "<form method='post' action='$PHP_SELF'>"; ?> <?$db = "directory";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$bio = strtr($bio,$trans); echo "<tr>";echo "<th width=50>Full Name</th><td>$row->firstname $row->lastname</td></tr>";    echo "<tr><th width=50>E-mail</th><td>$row->email</td></tr>";    echo "<tr><th width=50>Address</th><td>$row->address</td></tr>";    echo "<tr><th width=50>City-State-Zip</th><td>$row->city $row->state $row->zip</td></tr>";     echo "<tr><th width=50>Bio</th><td>$bio</td></tr>";$id = $row->id;}echo "<br><input type=hidden name='id' value='$id'>";echo "</table><p>";?><p>Are you sure you want to <strong>DELETE</strong> this record?<BR><input type=submit name="dont" value="No, DON'T DELETE!!"><input type=submit name="delete" value="Yes, DELETE RECORD"><BR></form><?if ($delete) {    $query2 = "delete from directory where id='$id'";    mysql_db_query($database,$query2);    echo "<p><b><font color=red>YOUR RECORD HAS BEEN DELETED.</font> <a href=registrationadmin_all.php>[view all]</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p></p>";}mysql_close();?><? include ("../adminfooter.php"); ?>

<? }
 ?>