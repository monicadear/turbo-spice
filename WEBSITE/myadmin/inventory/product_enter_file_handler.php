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


<div id=indent>


<?

$enter=$_POST['enter'];

if ($enter) {
$name=$_POST['name'];
$filename=$_POST['filename'];
$productid=$_POST['productid'];



$target = "../../downloads/"; 


         // $_FILES['picture']['name'] is the filename that the 
          // file had on the uploader's computer. It is best to 
          // replace this filename with ereg() as in the example 
          // below to make sure you don't get characters in 
          // filename allowed in Windows but not in unix 

          $newname = ereg_replace("[^-.~[:alnum:]]", "_", $_FILES['picture']['name']);

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




 
 

/*Insert into database */
 include ("../../codes/adminconfig2.php"); 

$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="allproducts";
$sql = "update $tablebase set filename='$newname' 
		  where productid='$productid'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");

echo "<BR>";
echo "<a href=input_new.php>INPUT A NEW resource?</a><BR>";

echo "<BR><hr>\n";

echo "<a href=viewall.php>View ALL resources</a><BR>";

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






</div>
<!-- -------------- -->

<?

<? include ("../adminfooter.php"); ?>

<? }
?>