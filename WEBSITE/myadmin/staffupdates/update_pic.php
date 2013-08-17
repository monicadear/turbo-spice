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
<? $tablebase="staff"; ?><? include ("../adminheader.php"); ?>
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><h2>ADD PICTURE</h2>Upload a photo for the staff here.<BR><?php//global variables //$my_max_file_size 	= "1024000"; # in bytes$image_max_width	= "500";$image_max_height	= "500";?><BR><?
$aid=$_REQUEST['aid'];

?><? include ("../../codes/adminconfig2.php"); ?><?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sqlcountpic= "SELECT * FROM $tablebase where aid = $aid"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $title=$myrow["title"];				   $picturepass=$myrow["picture"];			   $trans = array_flip(get_html_translation_table(HTML_ENTITIES)); $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);  } ?><?echo "<h2>$title</h2>";?><? if ($picturepass == "") {echo "<form enctype='multipart/form-data' method='post'  action='update_pichandler.php'>";echo "File Upload:<BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='aid' value='$aid' size='18'>";echo "<input type='submit' name='enter' value='next step'></form>";}else if (isset($picturepass)) {   echo "Current photo:<BR>";   echo "<img src=/images/faces/$picturepass width=150 border=1><BR><BR>\n";echo "Do you want to <font color=red>replace this photo</font>?<BR>Use the following form:<BR>";echo "<form enctype='multipart/form-data' method='post'  action='update_pichandler.php'>";echo "File Upload:<BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='aid' value='$aid' size='18'>";echo "<input type='submit' name='enter' value='next step'>";echo "</form>";}?><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>