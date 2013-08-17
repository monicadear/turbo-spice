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
<? include ("catcontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<table border=0><?$submit=$_POST['submit'];if ($submit) {$productsupercategoryid=$_POST['productsupercategoryid'];$productcategoryid=$_POST['productcategoryid'];} ?><? echo "<form method='post' action='update_handlercat.php'>"; ?> <?$db = "productcategory";$query1 = "select * from $db where productcategoryid = '$productcategoryid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$productcategoryname = strtr($row->productcategoryname,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$productcategoryname = strtr($productcategoryname,$trans4);$productsupercategoryid = $row->productsupercategoryid;$productcategoryid = $row->productcategoryid;$productcategoryshoworder = $row->productcategoryshoworder;$publishedbox = $row->publishedbox; echo "<tr><th width=50>ID: </th><td>$productcategoryid</td></tr>";echo "<tr><th width=50>Super-Category: </th><td><input type=text name=productsupercategoryid value='$productsupercategoryid'> <a href=../productsupercategoryupdates/viewallcat.php target=new>show all super-categories</a></td></tr>";echo "<tr><th width=50>Category: </th><td><input type=text name='productcategoryname' value='$productcategoryname'></td></tr>";echo "<tr><th width=50>Show order: </th><td><input type=text name='productcategoryshoworder' value='$productcategoryshoworder' size=5></td></tr>";echo "<tr><td colspan=2>";if ($publishedbox=='Y') {echo "Published?: <input type=checkbox value=Y name=publishedbox checked>\n";} else if ($publishedbox=='N' || $publishedbox =='') {echo "Published?: NOT PUBLISHED.<BR><input type=checkbox value=Y name=publishedbox> Click to publish.\n";} else {  echo "Published?: <select name=publishedbox><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";}echo "</td></tr>";}echo "<tr><td colspan=2><br>";
echo "<input type=hidden name='productcategoryid' value='$productcategoryid'>";echo "</td></tr></table><p>";?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>