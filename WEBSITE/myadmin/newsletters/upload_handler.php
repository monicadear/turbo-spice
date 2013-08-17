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
<? include ("newsletters_nav.php"); ?>


<?php
//global variables //
$my_max_file_size 	= "4024000"; # in bytes
$image_max_width	= "2800";
$image_max_height	= "2800";

?>


<BR>


<?

$enter=$_POST['enter'];
$filename=$_POST['filename'];
$id=$_POST['id'];


$target = "../../newsletters/"; 


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




/*Insert into database */
 include ("../../codes/adminconfig2.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="newsletters";
$sql = "update $tablebase set filename='$newname' 
		  where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");



echo "<BR><BR><BR>";
echo "<a href=viewall.php>View <b>ALL</b> newsletters</a><BR>";
echo "<a href=../indexadmin.php>Back to administrator home...</a>";
  

unset ($newname);
unset ($caption);


mysql_close();

     unset($picture);
     unset($imagetype);
     unset($enter);


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