<?
/**
 * uploaddoc_handler.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: June 29, 2009 by Monica Flores 10kwebdesign
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

<div id=memberdetails>
<h1>Document Uploaded</h1>

<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>
<?php//global variables //$my_max_file_size 	= "1024000"; # in bytes$image_max_width	= "1000";$image_max_height	= "1000";?><?if($session->logged_in){

$filename=$_POST['filename'];
$id=$_POST['id'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$title=$_POST['title'];
$text=$_POST['text'];
$weblink=$_POST['weblink'];
$publish=$_POST['publish'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];

$target = "../../downloads/"; 


         // $_FILES['picture']['name'] is the filename that the 
          // file had on the uploader's computer. It is best to 
          // replace this filename with ereg() as in the example 
          // below to make sure you don't get characters in 
          // filename allowed in Windows but not in unix 

          $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['picture']['name']);

$target = $target . $newname ; 


 $ok=1; 


	//If there is no file uploaded
	  if($_FILES['picture']['error'] == 4) 		
  { 
      echo "No file was uploaded in the form field 'picture'.";       
  } 



	//This is our limit file type condition 
	if ($_FILES['picture']['type'] =="text/php") 
	{ 
	echo "No PHP files allowed."; 
	$ok=0; 
	} 


	//Here we check that $ok was not set to 0 by an error 
	if ($ok==0) 
	{ 
	echo "Sorry, your file was not uploaded."; 
	} 

//If everything is ok we try to upload it 
else 
	{ 




if(move_uploaded_file($_FILES['picture']['tmp_name'], $target)) 
	{ 
	echo "<h1>SUCCESS</h1>Thank you! The file has been uploaded.<BR><BR>"; 

 /*Insert into database */ include ("../codes/adminconfig.php"); $date=date(Ymdhis);
$transweb["http://"] = "";$urllink = strtr($urllink, $transweb);


$id=$_REQUEST['id'];

$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="downloads";
$sql = "insert into downloads values ('','$category','$subcategory','$title','$text','$newname','$weblink','$id','$date','$date','$publish','$evt_type','$tags')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");  unset ($newname);mysql_close();     unset($filename);     unset($imagetype);     unset($enter);}?>
<!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><div align=left><a href="javascript:history.go(-1)">Upload another Document </a></div>

</div><? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>