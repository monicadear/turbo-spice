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
<? include ("slidecontent_nav.php"); ?>


Upload a photo for the page here.<BR>

<?php
//global variables //
$my_max_file_size 	= "4024000"; # in bytes
$image_max_width	= "2800";
$image_max_height	= "2800";

?>


<BR>


<?
   echo "Current photo:<BR>";
   echo "<img src=/slide/5.jpg width=150 border=1><BR><BR>\n";
echo "Do you want to <font color=red>replace this photo</font>? Use the following form:<BR>";
echo "<form enctype='multipart/form-data' method='post'  action='$PHP_SELF'>";
echo "File Upload:<BR>\n";
echo "<input type='file' name='picture' size='18'><BR><BR>\n";
echo "<input type='submit' name='enter' value='submit'>";
echo "</form>";

?>



<?
$enter=$_POST['enter'];
$picture=$_POST['picture'];

if ($enter) {


$target = "../../slide/5.jpg"; 



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



echo "<BR><BR><BR>";
echo "<a href=viewall.php>View <b>ALL</b> slide photos</a> and press RELOAD to view the new images<BR>";
echo "<a href=../indexadmin.php>Back to administrator home...</a>";
  

unset ($newname);
unset ($caption);

mysql_close();
}

     unset($picture);
     unset($imagetype);
     unset($enter);



}


}


?>
<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->




<? include ("../adminfooter.php"); ?>

<? }
?>