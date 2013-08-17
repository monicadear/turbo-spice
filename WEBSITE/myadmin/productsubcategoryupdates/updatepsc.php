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
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include ("psccontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><BR><table border=0><?$submit=$_POST['submit'];if ($submit) {$productsubcategoryid=$_POST['productsubcategoryid'];} ?><? echo "<form method='post' action='update_handlerpsc.php'>"; ?> <?$db = "productsubcategory";$query1 = "select * from $db where productsubcategoryid = '$productsubcategoryid'";
$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$productsubcategoryname = strtr($row->productsubcategoryname,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$productsubcategoryname = strtr($productsubcategoryname,$trans4);$productsubcategoryid = $row->productsubcategoryid;$productsubcategorysecid = $row->productsubcategorysecid;$productsubcategoryshoworder = $row->productsubcategoryshoworder;$publishedbox = $row->publishedbox; echo "<tr><th width=50>ID: </th><td>$productsubcategoryid</td></tr>";

echo "<tr><th></th><td>";

echo "<select name=productsubcategorysecid>";include("../../codes/adminconfig.php"); include("producttypelist_category.php");echo "</select><BR>\n";

echo "</td></tr>";
echo "<tr><th width=50>Name: </th><td><input type=text name='productsubcategoryname' value='$productsubcategoryname' size=50></td></tr>";echo "<tr><th width=50>Show order: </th><td><input type=text name='productsubcategoryshoworder' value='$productsubcategoryshoworder' size=5></td></tr>";echo "<tr><td colspan=2>";if ($publishedbox=='Y') {echo "Published?: <input type=checkbox value=Y name=publishedbox checked>\n";} else if ($publishedbox=='N' || $publishedbox =='') {echo "Published?: <span class=red>NOT PUBLISHED.</span><BR><input type=checkbox value=Y name=publishedbox> Click to publish.\n";} else {  echo "Published?: <select name=publishedbox><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";}echo "</td></tr>";}echo "<tr><td colspan=2><br><input type=hidden name='productsubcategoryid' value='$productsubcategoryid'>";echo "</td></tr></table><p>";?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>