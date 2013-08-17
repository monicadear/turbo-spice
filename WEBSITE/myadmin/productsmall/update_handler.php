<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?>

<?$update=$_POST['update'];

if ($update) {/*Insert into database */$id=$_POST['id'];$title=$_POST['title'];$title2=$_POST['title2'];
$creator=$_POST['creator'];$text=$_POST['text'];$moreinfo=$_POST['moreinfo'];$price=$_POST['price'];$filename=$_POST['filename'];$filename2=$_POST['filename2'];$webslink=$_POST['webslink'];$author=$_POST['author'];$showorder=$_POST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$title2 = htmlspecialchars("$title2", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);


$moreinfo = htmlspecialchars("$moreinfo", ENT_QUOTES);$moreinfo = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $moreinfo);$moreinfo = ereg_replace("\r\n", "&lt;BR&gt;\n", $moreinfo);


$author = htmlspecialchars("$author", ENT_QUOTES);$date = date("YmdHis");

$transweb["http://"] = "";$webslink = strtr($webslink, $transweb);

}
?>


<? include ("../../codes/adminconfig2.php"); ?><?


$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="productsmall";$sql = "update $tablebase set date='$date', title='$title', title2='$title2', creator='$creator', text='$text', moreinfo='$moreinfo', price='$price', filename='$filename', filename2='$filename2', webslink='$webslink', author='$author', showorder='$showorder'  
		where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();?><?echo "<BR>Thanks for your update <B>$author</B>."; echo "<BR>$id<BR>\n$date<BR>\n<BR>\n$title<BR>\n$title2<BR>$creator<BR>\n\n$text<BR>$moreinfo<BR>\n\n$author</p>";unset ($date);unset ($title);unset ($text);unset ($moreinfo);echo "<p align=center><font size=+2><a href=viewall.php>see all pages...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>