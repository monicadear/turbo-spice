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
echo "<a href=../linkcategories/viewall.php target=new>view all link categories</a><BR>";

echo "<select name=category>";

echo "</td></tr>";

echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";

<? }
?>