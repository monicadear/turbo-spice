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
<? include ("catcontent_nav.php"); ?>


<h1>Admin: Product Subcategory Edit</h1>

echo "<td>\n<form method=post action=updatecat.php><input type=hidden name=productcategoryid value=$productcategoryid><input type=hidden name=productsupercategoryid value=$productsupercategoryid><input type=submit name=submit value='update category'></form></td>\n";


echo "<td>\n<form method=post action=deletecat.php><input type=hidden name=productcategoryid value=$productcategoryid><input type=hidden name=productsupercategoryid value=$productsupercategoryid><input type=submit name=submit value='delete category'></form></td>\n";


<? }
?>