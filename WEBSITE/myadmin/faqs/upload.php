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
<? include ("faqs_nav.php"); ?><h1>Admin: Upload FAQs Content Edit</h1><p><B>You may edit these FAQ uploads within the site.</B></p><?php//global variables //$my_max_file_size 	= "624000"; # in bytes$image_max_width	= "1000";$image_max_height	= "1000";?><form enctype='multipart/form-data' method='post'  action='<?$PHP_SELF?>'>Your name: <input type='text' name='author' value='<?echo"$author";?>' size='18'><BR><BR>
What is the file that you're uploading<BR>(e.g. Donor Story, by John Doe): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>
Description of file:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>
Enter the weblink, if any, that this document will link to:<BR>(e.g. http://www.website.org/myfaq.html): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR><BR>


<b>Category:</b> <select name="category"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="faqcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}
mysql_close();?></select>  <a href=../faqcategories/viewall.php target=new>edit FAQ category</a><BR><BR>


Display order: <input type='text' name='showorder' value='<?echo"$showorder";?>' size='5'><BR><BR>


Choose a .JPG or .GIF or .PDF file from your hard drive.<BR>
Recommended image size is 800x800 maximum.<BR><BR>
File Upload:<BR><input type='file' name='filename' size='18'><BR><BR><input type='hidden' name='id' value='$id'><input type='submit' name='enter' value='submit'></form><BR><?if ($enter) {//////////////////////////////////////////////  if($_FILES['filename']['error'] == 4)   {       echo "No file was uploaded in the form field 'filename'.";         }   else if($_FILES['filename']['error'] != 0)  {      echo "There was an error uploading the file, Code ".            $_FILES['filename']['error'].". Decode at: ".           "http://us4.php.net/manual/en/features.file-upload.errors.php ";      exit;  }  else       {          $dest = $dest. "faqs";
          // $_FILES['filename']['name'] is the filename that the           // file had on the uploader's computer. It is best to           // replace this filename with ereg() as in the example           // below to make sure you don't get characters in           // filename allowed in Windows but not in unix           $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['filename']['name']);
$newname = "$datestamp".$newname;            $dest  = $dest . "/". $newname;          // copy file to a permanent place:          if(!move_uploaded_file($filename, $dest))           {              // the copy() function would also have worked.              echo "Upload problem detected.";               exit;           }           // the uploaded file is set to chmod 600, and is          // unreadable by webserver. If you want your website          // to be able to serve the file to people, chmod it          // readable by 'other'          chmod($dest, 0644);            $url = "/faqs/$newname ";           echo "<BR><font color=red size=+2>Success:</font> <a href=$url target=new>$newname</a> has been uploaded<BR>";      } # end actually put uploaded file on filesystem             /*Insert into database */ include ("../../codes/adminconfig2.php"); $date=date(Ymdhis);
$transweb["http://"] = "";$urllink = strtr($urllink, $transweb);

$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="faqs";
$sql = "insert into faqs values ('','$date','$category','$title','$text','$newname','$weblink','$author')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");  unset ($newname);mysql_close();}     unset($filename);     unset($imagetype);     unset($enter);?>
<!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>