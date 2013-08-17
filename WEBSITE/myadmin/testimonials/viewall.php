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

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("testimonialcontent_nav.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>

<h1>Admin: Testimonial Content Edit</h1>

<p>
<B>You may edit these main testimonials within the site.</B></p>



<table border=1 width=100%>
<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$query= "SELECT * FROM testimonialcontent order by id"; 
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 

$e=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
                   $id=$myrow["id"];					   
                   $date=$myrow["date"];
                   $text=$myrow["text"];
                   $author=$myrow["author"];
                   $location=$myrow["location"];
                   $showorder=$myrow["showorder"];


$pos = strpos($text,"&lt;BR&gt;&lt;BR&gt;"); 
$preview = substr($text,0,$pos-5); 

$trans5["&lt;b&gt;"]= "<b>";
$trans5["&lt;/b&gt;"]= "</b>";
$trans5["&lt;i&gt;"]= "<i>";
$trans5["&lt;/i&gt;"]= "</i>";
$trans5["&lt;BR&gt;"]= "<BR>";
$preview = strtr($preview,$trans5);



echo "<tr>";
echo "<td>$id</td>";
echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td><span class=smalladmintext>$preview...</span>\n";
echo "</td>\n\n";
echo "<td><span class=red>$showorder</span></td>\n";
echo "<td><span class=smalladminauthortext>$author</span>\n<BR><span class=smalladminauthortext>\n";
print theDate ("d F Y","$date"); 
echo "</span></td>\n";
echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>\n";
echo "<td><form method=post action=delete.php><input type=hidden name=id value=$id><input type=submit name=delete value=delete></form></td>\n";

echo "</tr>\n";
echo "\n";
}

$e++; 
?>

</table>

<?
mysql_close($connection); 
?>

<? include ("../adminfooter.php"); ?>

<? }
?>