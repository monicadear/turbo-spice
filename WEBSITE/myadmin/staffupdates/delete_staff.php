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
<? include ("../../codes/adminconfig.php"); ?>
echo "<tr><th>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";

echo "<tr><th>Text: </th><td><input type=text name='text' value='$row->text' size=50></td></tr>";

echo "<tr><th>Email: </th><td><input type=text name='email' value='$row->email' size=50></td></tr>";
}


<? }
?>