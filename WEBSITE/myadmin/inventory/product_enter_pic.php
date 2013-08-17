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
<?$productid=$_POST['productid'];?><div id=indent><h1>ADD PHOTO</h1>Upload a photo for your product here.<BR><?php//global variables //$my_max_file_size 	= "3899000"; # in bytes$image_max_width	= "3000";$image_max_height	= "3000";?><BR><table><tr><td valign=top><? include ("../../codes/adminconfig.php"); ?>
<?$productid=$_REQUEST['productid'];?>
<?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sqlcountpic= "SELECT * FROM allproducts where productid = $productid"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $name=$myrow["name"];				   $picture1=$myrow["picture1"];		   $picture2=$myrow["picture2"];						                      $productid=$myrow["productid"];			$maindirectorypass=$myrow["category"];					$mainfileimagepass=$myrow["category"];					   $trans = array_flip(get_html_translation_table(HTML_ENTITIES)); $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$name = strtr($name,$trans);  } ?><?echo "<span class=red>$name</span>";?><? if ($picture1 == "") {echo "<form enctype='multipart/form-data' method='post'  action='product_enter_pic_handler.php'>";echo "Press <b>choose file</b>, then browse to a .JPG file from your hard drive, select it, then press <b>next step</b><BR><BR><span class=smallnotetext>Note: Make sure your image is 72 dpi and approximately 350pixels wide by 300pixels tall. Large images take a long time to load.</span><BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type=hidden name=maindirectorypass value='$maindirectorypass'>";echo "<input type=hidden name=mainfileimagepass value='$mainfileimagepass'>";echo "<input type=hidden name=name value='$name'>";echo "<input type='hidden' name='productid' value='$productid' size='18'>";echo "<input type='submit' name='enter' value='next step'></form>";}else if (isset($picture1)) {echo "<table border=0 cellspacing=5><tr><td valign=top>";   echo "Current photo:<BR>";   echo "<img src=/productitems/allproducts/images_allproducts/$picture1 width=150 border=1><BR><BR>\n";	echo "</td><td valign=top>";echo "Do you want to <font color=red><b>replace</b> this photo?</font><BR>\n";echo "<b>TO REPLACE</b> this existing photo...<BR>";echo "Press <b>choose file</b>, then browse to a .JPG file from your hard drive, select it, then press <b>next step</b><BR><BR><span class=smallnotetext>Note: Make sure your image is 72 dpi and approximately 450pixels wide by 400pixels tall. Large images take a long time to load.</span><BR><BR>\n\n";echo "<form enctype='multipart/form-data' method='post'  action='product_enter_pic_handler.php'>";echo "<input type='file' name='picture' size='18'><BR>\n";echo "<input type='hidden' name='productid' value='$productid' size='18'>";echo "<input type=hidden name=maindirectorypass value='$maindirectorypass'>";echo "<input type=hidden name=mainfileimagepass value='$mainfileimagepass'>";echo "<input type='submit' name='enter' value='next step'>";echo "</form>\n";echo "</td></tr></table><BR>\n";}?></td></tr></table></div><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
?>