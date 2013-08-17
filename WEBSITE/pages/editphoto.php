<?
/**
 * editphoto.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 by Monica Flores 10kwebdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>



<? include ("exclusions.php"); ?>


<? include ("pagepartial0.php"); ?>




<div id=memberdetails><?
$id=$_REQUEST['id'];?><h1>Update my Information</h1>


<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>

<?php//global variables //$my_max_file_size 	= "624000"; # in bytes$image_max_width	= "400";$image_max_height	= "500";?><BR><? include ("../codes/adminconfig.php"); ?><?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sqlcountpic= "SELECT * FROM directory where id = $id"; $sql_countresultpic = mysql_query($sqlcountpic, $connection) or die ("Couldn't execute query for pictures");while ($myrow = mysql_fetch_array($sql_countresultpic)){                    $id=$myrow["id"];		                   $firstname=$myrow["firstname"];		                   $lastname=$myrow["lastname"];		                   $email=$myrow["email"];				   $picturepass=$myrow["picture1"];			   $datestamp=date(Ymdhis); } ?><? 




if ($picturepass == "") {


echo "Updating picture/logo for <b>$firstname $lastname</b>.<BR>";echo "Choose a .jpg or .gif file from your hard drive. Recommended size is 350x350 maximum.<BR><BR>";

if($session->logged_in){

echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";

echo "File Upload:<BR>\n";echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id'>";echo "<input type='submit' name='enter' value='submit'>";
echo "</form>";
}

else {
echo " Please log in.";
}

}else if (isset($picturepass)) {


   echo "Current photo:<BR>";

   echo "<img src=/memberuploads/$picturepass height=100 border=1><BR><BR>\n";echo "Do you want to <font color=red>replace this photo</font>?";

if($session->logged_in){
echo "<BR>Use the following button to choose a file from your hard drive:<BR>";echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";
echo "<input type='file' name='picture' size='18'><BR><BR>\n";echo "<input type='hidden' name='id' value='$id'>";echo "<input type='submit' name='enter' value='next step'>";
echo "</form>";
}

else {
echo " Please log in.";
}


}



?><?if ($enter) {//////////////////////////////////////////////  if($_FILES['picture']['error'] == 4)   {       echo "No file was uploaded in the form field 'picture'.";         }   else if($_FILES['picture']['error'] != 0)  {      echo "There was an error uploading the file, Code ".            $_FILES['picture']['error'].". Decode at: ".           "http://us4.php.net/manual/en/features.file-upload.errors.php ";      exit;  }  else       {          $dest = $dest."memberuploads";          // $_FILES['picture']['name'] is the filename that the           // file had on the uploader's computer. It is best to           // replace this filename with ereg() as in the example           // below to make sure you don't get characters in           // filename allowed in Windows but not in unix           $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['picture']['name']);
$newname = "$datestamp".$newname;            $dest  = $dest . "/". $newname;          // copy file to a permanent place:          if(!move_uploaded_file($picture, $dest))           {              // the copy() function would also have worked.              echo "Upload problem detected.";               exit;           }           // the uploaded file is set to chmod 600, and is          // unreadable by webserver. If you want your website          // to be able to serve the file to people, chmod it          // readable by 'other'          chmod($dest, 0644);            $url = "/memberuploads/$newname ";           echo "<BR><font color=red>Success:</font> Your file has been uploaded<BR>"; echo "<font size=+2><b>See the updated listing: <a href=moreinfo.php?id=$id class=larger>check listing</a></b></font>";      } # end actually put uploaded file on filesystem             /*Insert into database */ include ("../codes/adminconfig.php"); $db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="directory";
$id=$_REQUEST['id'];$sql = "update $tablebase set picture1='$newname' 		  where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");  

$timestamp=date(Ymdhis);
$from = "From: Assets Alliance Website <$timestamp@assetsalliance.org>";
$to = "Membership <monica@10kgroup.com>";
$ip = $_SERVER['REMOTE_ADDR'];
$subject = "UPDATED PHOTO for ASSETSALLIANCE.org";

  # Setup for text OR html

  $eol="\r\n";
  $subject = strip_tags(str_replace("\r", "\n\n", $subject)).$eol.$eol;
  $subject = strip_tags(str_replace("<br>", "\n\n", $subject)).$eol.$eol;

$transmessage[","] = "\r\n"; 

$subject = strtr($subject, $transmessage);


$message = "A participant in the MEMBER DIRECTORY has updated their photo online at:\r http://www.assetsalliance.org$url\r\nThis message was automatically sent from the AssetsAlliance.org website.\r\n\r\nYou do not have to do anything to accept this listing.\r\n\r\n$subject\r\nhttp://www.assetsalliance.org/pages/moreinfo.php?id=$id\r\n\r\n";
$subjecttosend = "Updated PHOTO initiated by Assets Alliance MEMBER";



mail($to, $subjecttosend, $message, $from);








unset ($newname);mysql_close();}     unset($picture);     unset($imagetype);     unset($enter);













?>
<!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --></div><? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>