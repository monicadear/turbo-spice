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
<? include ("announcements_nav.php"); ?>


	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=60>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>


<tr><td><b>WEB LINK URL, if any:</b></td><td><input type ="text" name="url" rows="1" value="<?php echo $url ?>" size="50"> e.g. http://www.homepage.com</td></tr>


<tr><td><b>Submitted by:</b></td><td><? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"></td></tr>



<tr><td></td><td>




<tr><td></td><td>

<tr><td>Tags:</td><td>
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>



<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)


<? }
 ?>