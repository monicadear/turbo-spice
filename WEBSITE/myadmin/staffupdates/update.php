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
<? $db = "staff"; ?>
<? include ("../../codes/adminconfig.php"); ?>
$aid=$_REQUEST['aid'];
echo "<tr><th width=50>Last Name: </th><td><input type=text name='lastname' value='$row->lastname'></td></tr>";

 echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title'></td></tr>";


if (isset($picture) && $picture !== "") 
{
echo "<img src=/images/faces/$picture width=100>";
}

else {
echo "No picture available.";
}
echo "</td></tr>";

echo "<tr><th width=50>Display order: </th><td><input type=text name='showorder' value='$row->showorder'></td></tr>";


echo "<tr><th width=50>Category:<BR></th><td>";
echo "<a href=../staffcategories/viewall.php target=new>view all staff categories</a><BR>";

echo "<select name=stackorder>";

echo "</td></tr>";

<? }
?>