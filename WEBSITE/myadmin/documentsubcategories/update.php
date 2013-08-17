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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("documentsubcategorycontent_nav.php"); ?><table border=0><?$submit=$_POST['submit'];if ($submit) {$categoryid=$_POST['categoryid'];} ?><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "documentsubcategory";$query1 = "select * from $db where subcategoryid = '$subcategoryid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$subcategoryname = strtr($row->subcategoryname,$trans);  echo "<tr><th width=50>Document Subcategory:<BR></th><td><input type=text name='subcategoryname' value='$subcategoryname' size=20></td></tr>";$subcategoryid = $row->subcategoryid;echo "<tr><td colspan=2><br><input type=hidden name='subcategoryid' value='$subcategoryid'>";echo "</td></tr></table><p>";
}?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<?mysql_free_result($db); mysql_close($connection); ?>

<? }
?>