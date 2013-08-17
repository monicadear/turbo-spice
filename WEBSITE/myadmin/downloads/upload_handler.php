<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?><h1>Admin: Upload Content Edit</h1><?php//global variables //$my_max_file_size 	= "31024000"; # in bytes$image_max_width	= "4000";$image_max_height	= "4000";?><?$enter=$_POST['enter'];

$title=$_POST['title'];
$text=$_POST['text'];
$weblink=$_POST['weblink'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$checkbox=$_POST['checkbox'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];
$publish=$_POST['publish'];

$filename=$_POST['filename'];$id=$_POST['id'];$target = "../../downloads/"; 


         // $_FILES['filename']['name'] is the filename that the 
          // file had on the uploader's computer. It is best to 
          // replace this filename with ereg() as in the example 
          // below to make sure you don't get characters in 
          // filename allowed in Windows but not in unix 

          $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['filename']['name']);

$target = $target . $newname ; 


 $ok=1; 


	//If there is no file uploaded
	  if($_FILES['filename']['error'] == 4) 		
  { 
      echo "No file was uploaded in the form field 'filename'.";       
  } 



	//This is our limit file type condition 
	if ($_FILES['filename']['type'] =="text/php") 
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




if(move_uploaded_file($_FILES['filename']['tmp_name'], $target)) 
	{ 
	echo "<h1>SUCCESS</h1>Thank you! The file has been uploaded.<BR><BR>"; 


 /*Insert into database */ include ("../../codes/adminconfig2.php"); $date=date(Ymdhis);
$transweb["http://"] = "";$weblink = strtr($weblink, $transweb);

$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="downloads";
$sql = "insert into downloads values ('','$category','$subcategory','$title','$text','$newname','$weblink','','$date','$date','$publish','$evt_type','$tags')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");  unset ($newname);mysql_close();     unset($filename);     unset($imagetype);     unset($enter);
} 
	else 
	{ 
	echo "There was a problem uploading your file. Please try again!<BR>\n"; 
	} 

} 



?>
<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->




<? include ("../adminfooter.php"); ?>

<? }
?>