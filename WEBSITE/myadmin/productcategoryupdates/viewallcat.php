<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

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


<h1>Admin: Product Subcategory Edit</h1><table border=1 width=100%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM productcategory order by productcategoryid"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $productsupercategoryid=$myrow["productsupercategoryid"];                   $productcategoryid=$myrow["productcategoryid"];                   $productcategoryname=$myrow["productcategoryname"];                   $productcategoryshoworder=$myrow["productcategoryshoworder"];                   $picture1=$myrow["picture1"];                   $publishedbox=$myrow["publishedbox"];echo "\n<tr>\n";if ($picture1 == ""){echo "<td width=110><span class=rednotlive>No Picture Available.</span></td>";} else {echo "<td width=110><img src=/productitems/allproducts/images_allproducts/$picture1 width=100 border=0>\n</td>";}echo "<td>\n<form method=post action=productpage_enter_pic.php><input type=hidden name=productcategoryid value=$productcategoryid><input type=submit name=submit value='update photo'></form></td>\n";echo "<td><font color=red>$productsupercategoryid</font> $productcategoryid</td>";echo "<td><h2>$productcategoryname</h2></td>\n";echo "<td>order: $productcategoryshoworder</td>\n";echo "<td>";if ($publishedbox =="Y") {echo "<span class=green>Published: $publishedbox</span>\n";}else if ($publishedbox =="" || $publishedbox == null) {echo "<span class=rednotlive>NOT LIVE</span>\n";}echo "</td>\n";

echo "<td>\n<form method=post action=updatecat.php><input type=hidden name=productcategoryid value=$productcategoryid><input type=hidden name=productsupercategoryid value=$productsupercategoryid><input type=submit name=submit value='update category'></form></td>\n";


echo "<td>\n<form method=post action=deletecat.php><input type=hidden name=productcategoryid value=$productcategoryid><input type=hidden name=productsupercategoryid value=$productsupercategoryid><input type=submit name=submit value='delete category'></form></td>\n";
echo "</tr>\n";}$e++; ?></table><?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>