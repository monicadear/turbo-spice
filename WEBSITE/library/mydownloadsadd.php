<SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[1].titledownload,"Please enter the title for this item."); // Check to make sure required information exists.           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].text,"Please enter the description.");            return CanSubmit;                     }--> </SCRIPT><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><?


?>

<?
if ($session->userlevel>="2"){?>

<FORM method=post enctype='multipart/form-data'  action=/members/memberphp_handlerdownload.php ONSUBMIT='return ValidateData()';>

<table><tr><th>Title<span class=red>*</span>:</th><td><input type ="text" name="titledownload" rows="1" value="<?php echo $titledownload ?>" size="40"></td></tr>

<tr><th valign=top>Description<span class=red>*</span>:</th><td>
<textarea name='text' rows=3 cols=20><?echo"$text";?></textarea></td></tr>


<tr><th>Weblink:</th><td><input type ="text" name="weblink" size="40" value="<?php echo $weblink ?>"><BR>(e.g., http://www.mysite.com)</td></tr>


<tr><th valign=top>category:</th><td><select name="category"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="documentcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value='$categoryid'>$categoryname</option>\n";$c++;}?></select></td></tr>
<tr><th valign=top>subcategory:</th><td><select name="subcategory"><option></option><?include("../codes/adminconfig.php");/*Search database for item*/$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase2="documentsubcategory";$sql2 = "SELECT * FROM $tablebase2 ORDER BY subcategoryid ASC"; $sql_result2 = mysql_query($sql2, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow2 = mysql_fetch_array($sql_result2)){                    $subcategoryid=$myrow2["subcategoryid"];                   $subcategoryname=$myrow2["subcategoryname"];echo "<option value=$subcategoryid>$subcategoryname</option>\n";$d++;}?></select></td></tr>


<tr><td>PUBLISHED to the site?</td><td><input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> <span class=smaller>Check to include this in the live listings.</span></td></tr>


<tr><td></td><td><input type="checkbox" value="1" name="evt_type" checked onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> <span class=smaller>Only members may view this.</span></td></tr>

<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="40" value="<?php echo $tags ?>"><BR>(add some descriptive tags, using commas to separate)
</td></tr>

<tr><td></td><td>

Choose a file from your hard drive.<BR>
File Upload:<BR><input type='file' name='filename' size='18'><BR><BR><input type='submit' name='enter' value='submit'></form><BR>



</td></tr></table>


<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>
<div align=right><a href=#top>top of page</a></div>
