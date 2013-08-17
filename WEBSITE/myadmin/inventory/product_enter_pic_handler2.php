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
<div id=indent><?$enter=$_POST['enter'];if ($enter) {/*Insert into database */$productid=$_POST['productid'];$mainfileimagepass=$_POST['mainfileimagepass'];$maindirectorypass=$_POST['maindirectorypass'];$picture1=$_POST['picture1'];$picture2=$_POST['picture2'];$name=$_POST['name'];?><?//////////////////////////////////////////////  if($_FILES['picture']['error'] == 4)   {       echo "No file was uploaded in the form field 'picture'.";         }   else if($_FILES['picture']['error'] != 0)  {      echo "There was an error uploading the file, Code ".            $_FILES['picture']['error'].". Decode at: ".           "http://us4.php.net/manual/en/features.file-upload.errors.php ";      exit;  }  else       {          $dest = $dest. "/productitems/allproducts/images_allproducts";          // $_FILES['picture']['name'] is the filename that the           // file had on the uploader's computer. It is best to           // replace this filename with ereg() as in the example           // below to make sure you don't get characters in           // filename allowed in Windows but not in unix           $newname = ereg_replace("[^-.~[:alnum:]]", "", $_FILES['picture']['name']);            $dest  = $dest . "/". $newname;          // copy file to a permanent place:          if(!move_uploaded_file($picture, $dest))           {              // the copy() function would also have worked.              echo "Upload problem detected. <A HREF=javascript:history.go(-1)>Try again.</a>";               exit;           }           // the uploaded file is set to chmod 600, and is          // unreadable by webserver. If you want your website          // to be able to serve the file to people, chmod it          // readable by 'other'          chmod($dest, 0644);           $url = "/productitems/images_details/$newname ";           echo "<BR>Success: This picture was added.<BR><a href=$url target=new><img src=$url width=150></a><BR>Picture name <a href=$url target=new>$url</a><BR><BR>";      } # end actually put uploaded file on filesystem             /*Insert into database */ include ("../../codes/adminconfig2.php"); $db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="allproducts";$sql = "update $tablebase set picture2='$newname' 		  where productid='$productid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");echo "<a href=input_new.php>INPUT A NEW PRODUCT?</a><BR>";echo "<BR><hr>\n";echo "<a href=viewall.php>View ALL products</a><BR>";echo "<a href=../indexadmin.php>Back to administrator home...</a>";  unset ($newname);unset ($caption);mysql_close();}     unset($picture);     unset($imagetype);     unset($enter);?><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --></div><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
?>