<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->isAdmin()){
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
<? include ("faqs_nav.php"); ?><?$id=$_REQUEST['id'];?>Upload an item  here.<BR><?php//global variables //$my_max_file_size 	= "3024000"; # in bytes$image_max_width	= "3000";$image_max_height	= "3000";?><BR>
<?php



$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablepic="faqs";$sqlcountpic= "SELECT * FROM $tablepic where id = $id"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $id=$myrow["id"];		                   $title=$myrow["title"];		                   $picturepass=$myrow["filename"];$trans = array_flip(get_html_translation_table(HTML_ENTITIES)); $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);  } ?><?echo "<h2>$title</h2>";echo "<b>$picturepass</b>";?><? if ($picturepass == "") {echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";echo "File Upload:<BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id' size='18'>";echo "<input type='submit' name='enter' value='submit'></form>";}else if (isset($picturepass)) {   echo "Current item:<BR>";   echo "<img src=/faqs/$picturepass width=150 border=1><BR><BR>\n";echo "Do you want to <font color=red>replace this</a>? Use the following form:<BR>";echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";echo "File Upload:<BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id' size='18'>";echo "<input type='submit' name='enter' value='submit'>";echo "</form>";}?><?$enter=$_POST['enter'];
if ($enter) {$picture=$_POST['picture'];
$id=$_POST['id'];//////////////////////////////////////////////  if($_FILES['picture']['error'] == 4)   {       echo "No file was uploaded in the form field 'picture'.";         }   else if($_FILES['picture']['error'] != 0)  {      echo "There was an error uploading the file, Code ".            $_FILES['picture']['error'].". Decode at: ".           "http://us4.php.net/manual/en/features.file-upload.errors.php ";      exit;  }  else       {          $dest = $dest. "faqs";
          // $_FILES['picture']['name'] is the filename that the           // file had on the uploader's computer. It is best to           // replace this filename with ereg() as in the example           // below to make sure you don't get characters in           // filename allowed in Windows but not in unix           $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['picture']['name']);            $dest  = $dest . "/". $newname;          // copy file to a permanent place:          if(!move_uploaded_file($picture, $dest))           {              // the copy() function would also have worked.              echo "Upload problem detected.";               exit;           }           // the uploaded file is set to chmod 600, and is          // unreadable by webserver. If you want your website          // to be able to serve the file to people, chmod it          // readable by 'other'          chmod($dest, 0644);            $url = "/faqs/$newname ";           echo "<BR>Success: <a href=$url target=new>$newname</a><BR>";      } # end actually put uploaded file on filesystem             /*Insert into database */ include ("../../codes/adminconfig2.php"); $db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="faqs";$sql = "update $tablebase set filename='$newname' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");echo "<BR><BR><BR>";echo "<a href=viewall.php>View <b>ALL</b> articles</a><BR>";echo "<a href=../indexadmin.php>Back to administrator home...</a>";  unset ($newname);unset ($caption);mysql_close();}     unset($picture);     unset($imagetype);     unset($enter);?><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>