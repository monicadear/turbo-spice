<SCRIPT LANGUAGE="JavaScript" type="text/javascript">


?>

<?
if ($session->userlevel>="2"){

<div id=indent3>
<table>


<tr><th valign=top>Description<span class=red>*</span>:</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=40>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>



<tr><th>Submitted by<span class=red>*</span>:</th><td><input type ="text" name="author" rows="1" value="<?php echo $author ?>" size="30"></td></tr>



<tr><td></td><td>


<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="40" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>


<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)

<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>
