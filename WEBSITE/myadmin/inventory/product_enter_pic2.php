<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include("inventorynav.php");?>
<div id=indent><h1>ADD DETAIL PHOTO</h1>Upload a secondary photo for your product here.<BR><?php//global variables //$my_max_file_size 	= "3899000"; # in bytes$image_max_width	= "3000";$image_max_height	= "3000";?><BR><? include ("../../codes/adminconfig.php"); ?><?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablepic="allproducts";$sqlcountpic= "SELECT * FROM $tablepic where productid = $productid"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $name=$myrow["name"];				   $picture1=$myrow["picture1"];					  			 $picture2=$myrow["picture2"];						                      $product=$myrow["product"];					   $trans = array_flip(get_html_translation_table(HTML_ENTITIES)); $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$name = strtr($name,$trans);  } ?><?echo "<span class=red>$name</span><BR>";echo "<table border=0 cellspacing=5><tr><td valign=top>";   echo "Current photo:<BR>";   echo "<img src=/productitems/allproducts/images_allproducts/$picture1 width=150 border=1><BR><BR>\n";	echo "</td><td valign=top>";?><?echo "<form enctype='multipart/form-data' method='post'  action='product_enter_pic_handler2.php'>";echo "Do you want to <font color=red><b>add a SECOND (DETAIL) PHOTO</b> to this product?</font><BR><BR><BR>\n";echo "<b>TO ADD a DETAIL PHOTO</b> to this product...<BR><BR>";echo "Press <b>choose file</b>, then browse to a .JPG file from your hard drive, select it, then press <b>next step</b>.<BR><span class=smallnotetext>Note: Make sure your image is 72 dpi and approximately 350pixels wide by 300pixels tall. Large images take a long time to load.</span><BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type=hidden name=maindirectorypass value='$maindirectorypass'>";echo "<input type=hidden name=mainfileimagepass value='$mainfileimagepass'>";echo "<input type=hidden name=name value='$name'>";echo "<input type='hidden' name='productid' value='$productid' size='18'>";echo "<input type='submit' name='enter' value='next step'>";echo "</form>\n";echo "</td></tr></table><BR>\n";?></div><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
?>