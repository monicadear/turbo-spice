<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?>

Upload a file to attach to this item.


<BR>




<?php
$id=$_REQUEST['id'];
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


$tablenewsletters="newsletters";
$sqlcountnewsletters= "SELECT * FROM $tablenewsletters where id = $id"; 
$sql_countresultnewsletters = mysql_query($sqlcountnewsletters, $connection) or die ("Couldn't execute query for newsletters");


while ($myrow = mysql_fetch_array($sql_countresultnewsletters)){ 

                   $id=$myrow["id"];		
                   $title=$myrow["title"];		
		   $filepass=$myrow["filename"];
			   

$trans = array_flip(get_html_translation_table(HTML_ENTITIES)); 
$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";
$title = strtr($title,$trans); 
 
} 
?>

<?
echo "<h2>$title</h2>";
?>

<? if ($filepass == "") 

{

echo "<form enctype='multipart/form-data' method='post'  action='upload_handler.php'>";
echo "File Upload:<BR>\n";
echo "<input type='file' name='filename' size='18'><BR><BR>\n";
echo "<input type='hidden' name='id' value='$id' size='18'>";


echo "<input type='submit' name='enter' value='submit'></form>";

}

else if (isset($filepass)) {
   echo "Current file:<BR>";
   echo "<img src=/newsletters/$filepass width=150 border=1><BR><BR>\n";
echo "Do you want to <font color=red>replace this file</font>? Use the following form:<BR>";
echo "<form enctype='multipart/form-data' method='post'  action='upload_handler.php'>";
echo "File Upload:<BR>\n";
echo "<input type='file' name='filename' size='18'><BR><BR>\n";
echo "<input type='hidden' name='id' value='$id' size='18'>";
echo "<input type='submit' name='enter' value='submit'>";
echo "</form>";
}

?>




<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->






<? include ("../adminfooter.php"); ?>

<? }
?>