<SCRIPT LANGUAGE="JavaScript" type="text/javascript">


?>

<?
if ($session->userlevel>="2"){

<FORM method=post enctype='multipart/form-data'  action=/members/memberphp_handlerdownload.php ONSUBMIT='return ValidateData()';>

<table>

<tr><th valign=top>Description<span class=red>*</span>:</th><td>
<textarea name='text' rows=3 cols=20><?echo"$text";?></textarea></td></tr>


<tr><th>Weblink:</th><td><input type ="text" name="weblink" size="40" value="<?php echo $weblink ?>"><BR>(e.g., http://www.mysite.com)</td></tr>


<tr><th valign=top>category:</th><td><select name="category"><option></option>
<tr><th valign=top>subcategory:</th><td><select name="subcategory"><option></option>


<tr><td>PUBLISHED to the site?</td><td>


<tr><td></td><td>

<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="40" value="<?php echo $tags ?>"><BR>(add some descriptive tags, using commas to separate)
</td></tr>

<tr><td></td><td>

Choose a file from your hard drive.<BR>
File Upload:<BR>



</td></tr></table>


<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>

