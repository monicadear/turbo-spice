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


<tr><td><b>Insert new Super-Category</b> (e.g. Guitar):</td><td>
<select name=productsupercategoryid>
<? include ("superproducttypelist_type.php"); ?>
</select>

</td></tr>

<option value=1>1, higher on the page</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5, in the middle of the page</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10, lowest on the page</option>
</select>
</td></tr>

<tr><td>Published?:</td><td>

<? }
?>