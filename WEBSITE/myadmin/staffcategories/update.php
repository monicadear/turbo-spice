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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("staffcategorycontent_nav.php"); ?><table border=0><?$submit=$_POST['submit'];if ($submit) {$categoryid=$_POST['categoryid'];} ?><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "staffcategory";$query1 = "select * from $db where categoryid = '$categoryid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$categoryname = strtr($row->categoryname,$trans); $showorder = $row->showorder;
echo "<tr><th width=50>Category:<BR></th><td><input type=text name='categoryname' value='$categoryname' size=30></td></tr>";$categoryid = $row->categoryid;echo "<tr><td colspan=2><br><input type=hidden name='categoryid' value='$categoryid'>";echo "</td></tr>";

echo "<tr><th width=50>Display order:<BR></th><td><input type=text name='showorder' value='$showorder' size=10></td></tr>";

echo "</table><p>";
}?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>