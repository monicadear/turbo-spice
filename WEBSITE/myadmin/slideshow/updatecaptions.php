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
$publish=$row->publish;

$category=$row->category;


echo "<select name=category>";
include ("producttypelist_category.php");
echo "</select>";


echo "<a href=../categories/viewall.php target=new>(show categories)</a></td></tr>";



echo "<tr><th width=100>Type of Page:<BR></th><td>";


echo "<select name=subcategory>";
include ("producttypelist_subcategory.php");
echo "</select>";


echo "<a href=../pagetypes/viewall.php target=new>(show page types)</a></td></tr>";



	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='text' id='text' rows=10 cols=60>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('text');
		//-->
		</script>


</td></tr>







<? }
?>