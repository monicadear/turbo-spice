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
<? include ("../adminnav.php"); ?>

<BR><BR>

$description = $row->description;

$description = strtr($description,$trans);
    	echo "<td><b>Web Site:</b>  &nbsp; &nbsp; $row->website</td>";
	echo "<td><b>Email:</b>  &nbsp; &nbsp; $row->email</td>";
}

?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>