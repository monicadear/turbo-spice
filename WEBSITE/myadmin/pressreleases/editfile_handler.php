<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?>
$filename=$_REQUEST['filename'];
$id=$_REQUEST['id'];
$target = "../../pressreleases/"; 


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






else 
	{ 
	echo "There was a problem uploading your file. Please try again!<BR>\n"; 
	} 


}

<? }
?>