<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */

if(!$session->userlevel >=9){

include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?><?$id=$_REQUEST['id'];?>Upload the THUMBNAIL for the newsletter here.<BR><?php//global variables //$my_max_file_size 	= "3024000"; # in bytes$image_max_width	= "500";$image_max_height	= "500";?><BR>
<?php



$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablepic="newsletters";$sqlcountpic= "SELECT * FROM $tablepic where id = $id"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $id=$myrow["id"];		                   $title=$myrow["title"];		                   $thumbnail=$myrow["thumbnail"];$trans = array_flip(get_html_translation_table(HTML_ENTITIES)); $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);  } ?><?echo "<h2>$title</h2>";?><? if ($thumbnail == "") {echo "<form enctype='multipart/form-data' method='post'  action='uploadthumb_handler.php'>";echo "File Upload:<BR>\n";echo "<input type='file' name='thumbnail' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id' size='18'>";echo "<input type='submit' name='enter' value='submit'></form>";}else if (isset($thumbnail)) {   echo "Current thumbnail:<BR>";   echo "<img src=/newsletters/thumbnails/$thumbnail width=150 border=1><BR><BR>\n";echo "Do you want to <font color=red>replace this</font>? Use the following form:<BR>";echo "<form enctype='multipart/form-data' method='post'  action='uploadthumb_handler.php'>";echo "File Upload:<BR>\n";echo "<input type='file' name='thumbnail' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id' size='18'>";echo "<input type='submit' name='enter' value='submit'>";echo "</form>";}?><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>