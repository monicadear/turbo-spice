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
<? include ("catcontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><table border=0><?$submit=$_POST['submit'];if ($submit) {$productsupercategoryid=$_POST['productsupercategoryid'];} ?><? echo "<form method='post' action='delete_handlercat.php'>"; ?> <?$db = "productsupercategory";$query1 = "select * from $db where productsupercategoryid = '$productsupercategoryid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$productsupercategoryname = strtr($row->productsupercategoryname,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$productsupercategoryname = strtr($productsupercategoryname,$trans4);$productsupercategoryid = $row->productsupercategoryid;$productsupercategoryshoworder = $row->productsupercategoryshoworder;$publishedbox = $row->publishedbox; echo "<tr><th width=50>ID: </th><td>$productsupercategoryid</td></tr>";echo "<tr><th width=50>Category: </th><td><input type=text name='productsupercategoryname' value='$productsupercategoryname'></td></tr>";echo "<tr><th width=50>Show order: </th><td><input type=text name='productsupercategoryshoworder' value='$productsupercategoryshoworder' size=5></td></tr>";echo "<tr><td colspan=2>";if ($publishedbox=='Y') {echo "Published?: <input type=checkbox value=Y name=publishedbox checked>\n";} else if ($publishedbox=='N' || $publishedbox =='') {echo "Published?: NOT PUBLISHED.<BR><input type=checkbox value=Y name=publishedbox> Click to publish.\n";} else {  echo "Published?: <select name=publishedbox><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";}echo "</td></tr>";}echo "<tr><td colspan=2><br><input type=hidden name='productsupercategoryid' value='$productsupercategoryid'>";echo "</td></tr></table><p>";?><input type=submit name="delete" value="DELETE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>