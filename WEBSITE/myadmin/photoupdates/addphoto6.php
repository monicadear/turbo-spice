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
<? include ("allphotos_nav.php"); ?>


Upload a photo for the photo gallery here.<BR>

<?php
//global variables //
$my_max_file_size 	= "1024000"; # in bytes
$image_max_width	= "800";
$image_max_height	= "800";

?>


<BR>




<?php
$pid=$_POST['pid'];
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


$tablepic="allphotosextended";
$sqlcountpic= "SELECT * FROM $tablepic where pid = $pid"; 
$sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");


while ($myrow = mysql_fetch_array($sql_countresultpic)){ 

                   $title=$myrow["title"];		
		   $picturepass=$myrow["picture6"];
			   

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

<? if ($picturepass == "") 

{

echo "<form enctype='multipart/form-data' method='post'  action='addphoto6_handler.php'>";
echo "File Upload:<BR>\n";
echo "<input type='file' name='picture' size='18'><BR><BR>\n";
echo "<input type='hidden' name='pid' value='$pid' size='18'>";


echo "<input type='submit' name='enter' value='submit'></form>";

}

else if (isset($picturepass)) {
   echo "Current photo:<BR>";
   echo "<img src=/photogallery/$picturepass width=150 border=1><BR><BR>\n";
echo "Do you want to <font color=red>replace this photo</font>? Use the following form:<BR>";
echo "<form enctype='multipart/form-data' method='post'  action='addphoto6_handler.php'>";
echo "File Upload:<BR>\n";
echo "<input type='file' name='picture' size='18'><BR><BR>\n";
echo "<input type='hidden' name='pid' value='$pid' size='18'>";
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