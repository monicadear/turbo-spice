<?
/**
 * Memberhome.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 * Edits: monicadear January 11, 2010
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>

<? include ("../pages/exclusions.php"); ?>

<? include ("../pages/pagepartial0.php"); ?>

<?

if ($enter) {


//////////////////////////////////////////////
  if($_FILES['filename']['error'] == 4) 
  { 
      echo "No file was uploaded in the form field 'filename'.";       
  } 

  else if($_FILES['filename']['error'] != 0)
  {
      echo "There was an error uploading the file, Code ".
            $_FILES['filename']['error'].". Decode at: ".
           
"http://us4.php.net/manual/en/features.file-upload.errors.php ";
      exit;
  }


  else 
      {
          $dest = $dest."downloads";          // $_FILES['filename']['name'] is the filename that the 
          // file had on the uploader's computer. It is best to 
          // replace this filename with ereg() as in the example 
          // below to make sure you don't get characters in 
          // filename allowed in Windows but not in unix 

          $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['filename']['name']);
$newname = "$datestamp".$newname;
            $dest  = $dest . "/". $newname;
          // copy file to a permanent place:
          if(!move_uploaded_file($filename, $dest)) 
          {
              // the copy() function would also have worked.
              echo "Upload problem detected."; 
              exit; 
          } 

          // the uploaded file is set to chmod 600, and is
          // unreadable by webserver. If you want your website
          // to be able to serve the file to people, chmod it
          // readable by 'other'

          chmod($dest, 0644); 
 
          $url = "/downloads/$newname "; 
          echo "<BR><font color=red size=+2>Success:</font> <a href=$url target=new>$newname</a> has been uploaded<BR>";
      } # end actually put uploaded file on filesystem      




/*Insert into database */
 include ("../codes/adminconfig.php"); 
$date=date(Ymdhis);
$transweb["http://"] = "";
$urllink = strtr($urllink, $transweb);


$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="downloads";
$sql = "insert into downloads values ('','$category','$subcategory','$titledownload','$text','$newname','$weblink','','$date','$date','Y','$evt_type','$tags')"; 

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");

  


mysql_close();




$headers = 'From: Membership Updates <no-reply@strawbuilding.org>' . "\r\n" .
    'Reply-To: no-reply@strawbuilding.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$subject = "MEMBER-UPDATED DOWNLOADABLE FILE Added to the website";
$message = "A member has logged in and added a file to the $basewebsite Website. This is the text about that file:\r\n

Category: $category\r
Subcategory: $subcategory\r
Title: $titledownload\r
Description: $description\r
File: $newname $basewebsite/downloads/$newname\r
Website: $weblink\r


********************\r
NOTICE: You do not need to do anything. If the above contains inappropriate or offensive material, please log onto the administration page and delete this listing:\r\n

$basewebsite/myadmin/downloads/viewall.php\r

Thank you,\r
The Website Team";

mail($to, $subject, $message, $headers);



unset ($newname);

     unset($filename);
     unset($imagetype);
     unset($enter);








}


?>


<?echo "<div id=indent>";echo "<BR>Thanks for your submission.<BR>";
echo "Our webmaster will review your listing and post it in the next 3-5 business days.<BR>";
echo "Return to the <a href=/>homepage</a>.<BR>";echo "</div>";




unset ($titledownload);unset ($text);unset ($date);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);

?>



<? include ("../pages/exclusionsbottom.php"); ?>





<?php include ("../library/myfooter.php"); ?>