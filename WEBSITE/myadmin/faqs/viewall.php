<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
   if(!$session->userlevel >=4){
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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("faqs_nav.php"); ?>



<h1>Admin: Upload Content Edit</h1>

<p>
<B>You may review these main FAQs within the site.</B></p>




<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=0>
<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$querycatalog= "SELECT * FROM faqcategory order by categoryid"; 
$sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later"); 


                $g = 1;

while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	

echo "<tr><td colspan=9><h1>$cattitle</h1></td></tr>";
?>

<?

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$query= "SELECT * FROM faqs where category=$categoryid order by showorder"; 
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 

$e=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
                   $id=$myrow["id"];					   
                   $date=$myrow["date"];
                   $category=$myrow["category"];
                   $title=$myrow["title"];
                   $text=$myrow["text"];
                   $filename=$myrow["filename"];
                   $weblink=$myrow["weblink"];
                   $author=$myrow["author"];
                   $showorder=$myrow["showorder"];


$pos = strpos($text,"&lt;BR&gt;"); 
$preview = substr($text,0,$pos-1); 

$filenametoshow = substr("$filename", -3, 3);

$transweblink["http://"] = "";
$weblink = strtr($weblink, $transweblink);


echo "<tr>";
echo "<td width=20%><b>$id $title:</b></td>";
echo "<td>";

if ($filenametoshow == "jpg" || $filenametoshow == "JPG" || $filenametoshow == "gif" || $filenametoshow == "GIF"  || $filenametoshow == "png" || $filenametoshow == "PNG")
{
echo "<a href=/faqs/$filename><img src=/faqs/$filename width=150 border=0 alt=image></a><BR>";
echo "<a href=editfile.php?id=$id>edit file</a><BR>";
echo "<form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value='delete file'></form><BR>";
}

else if (isset ($filenametoshow) && $filenametoshow !=="") {
echo " <a href=/faqs/$filename>$filename</a><BR>";
echo "<a href=editfile.php?id=$id>edit file</a><BR>";
echo "<form method=post action=delete_download.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value='delete file'></form><BR>";
}

else {
echo "<a href=editfile.php?id=$id>add file</a>";
}

echo "</td>\n";
echo "<td><span class=smalladmintext>$preview</span></td>\n";
echo "<td><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>";
print theDate ("d F Y","$date"); 
echo "</span></td>";
echo "<td>";

echo "<span class=linkbrown>COPY and PASTE</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='5' cols='20' readonly><a href=$websitefullurl/pages/main.php?pageid=30&pagecategory=5#$id target=new>$title</a></textarea>";

echo "</td>\n\n";

echo "<td>category: $category</td>";

echo "<td>$showorder</td>";


echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td>";

if($session->userlevel >=7){ 
echo "<form method=post action=delete_faq.php><input type=hidden name=id value=$id><input type=submit name=submit_delete value=delete></form>";
}

echo "</td>";
echo "</tr>";
}

$e++; 
?>


<?
}
$g++;
?>



</table>


<?
mysql_close($connection); 
?>

<? include ("../adminfooter.php"); ?>

<? }
?>