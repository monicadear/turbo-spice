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
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("faqs_nav.php"); ?>
What is the file that you're uploading<BR>(e.g. Donor Story, by John Doe): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>
Description of file:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>
Enter the weblink, if any, that this document will link to:<BR>(e.g. http://www.website.org/myfaq.html): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR><BR>


<b>Category:</b> <select name="category"><option></option>
mysql_close();


Display order: <input type='text' name='showorder' value='<?echo"$showorder";?>' size='5'><BR><BR>


Choose a .JPG or .GIF or .PDF file from your hard drive.<BR>
Recommended image size is 800x800 maximum.<BR><BR>
File Upload:<BR>
          // $_FILES['filename']['name'] is the filename that the 
$newname = "$datestamp".$newname;
$transweb["http://"] = "";


$sql = "insert into faqs values ('','$date','$category','$title','$text','$newname','$weblink','$author')"; 


<? }
?>