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
<? include ("../adminnav.php"); ?>
<tr><td><div align=right>Please add a brief bio, describing your services in 5-7 sentences:</div></td><td valign=top><textarea name=bio rows=5 cols=35>
<?echo"$bio";?> 
</textarea>
</td></tr>
<tr><th>Web Site: </th><td><input type=text name=website value="<?echo"$website";?>" size=40></td></tr>
<tr><th>E-mail: </th><td><input type=text name=email value="<?echo"$email";?>" size=40></td></tr>

<tr><td><div align=right><b>Membership Type:</b></div></td><td><select name="typeofcontact"><option></option>



</table>
<input type=radio name=publish value=Y checked> Yes<BR>

<? }
 ?>