<SCRIPT LANGUAGE="JavaScript" type="text/javascript">


?>

<?
if ($session->userlevel>="2"){

<table>
<?$todayyear=date(Y);
$todayyearplusone=$todayyear+1;
$todayyearplustwo=$todayyear+2;

?>

<tr> <td width="100" align="right">Start Date:</td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option>

<tr><th>Title<span class=red>*</span>:</th><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="25"></td></tr>

<tr><th valign=top>Description<span class=red>*</span>:</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=25>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>

<tr><th>Time<span class=red>*</span>:</th><td><input name="starttime" id="starttime" size="10"> to <input name="endtime" id="endtime" size="10"><BR>e.g. 8:30am to 10:00am </td></tr>
$price="0";
$pricenonmembers="0";
 ?>

<tr><th>Price (members)<span class=red>*</span>:</th><td>$<input name="price" id="price" value='<?echo"$price";?>' size="10"> 0 if no charge</td></tr>



<tr><td></td><td>

<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="25" value="<?php echo $tags ?>"><BR>(add some descriptive tags, using commas to separate)
</td></tr>



<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)

<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>
