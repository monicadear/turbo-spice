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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("rotator_nav.php"); ?><h1>Admin: Rotating Page Content Edit</h1><p><B>You may edit these main rotating items within the site.</B></p><table border=1 width=100%><tr><td>ID</td><td>Title</td><td>Photos</td><td>Category</td><td>Preview</td><td>Author</td><td>Order</td><td>Last updated</td><td></td><td></td></tr><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM rotator order by id"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $category=$myrow["category"];                   $subcategory=$myrow["subcategory"];                   $title=$myrow["title"];                   $titleshow=$myrow["titleshow"];                   $text=$myrow["text"];                   $author=$myrow["author"];                   $picture1=$myrow["picture1"];                   $picture2=$myrow["picture2"];                   $showorder=$myrow["showorder"];$pos = strpos($text,"&lt;BR&gt;&lt;BR&gt;"); $preview = substr($text,0,$pos-5); $trans5["&lt;b&gt;"]= "<b>";$trans5["&lt;/b&gt;"]= "</b>";$trans5["&lt;i&gt;"]= "<i>";$trans5["&lt;/i&gt;"]= "</i>";$trans5["&lt;BR&gt;"]= "<BR>";$preview = strtr($preview,$trans5);echo "<tr>";echo "<td>$id </td>";echo "<td width=20%>";echo "<b>$titleshow:</b><BR><i>$title</i></td>\n";echo "<td>";if ($picture1 == ""){echo "<form method=post action=addphoto.php><input type=hidden name=id value=$id><input type=submit name=submit value='add photo'></form>\n";}else {echo "<img src=/rotatorimages/$picture1 width=100 hspace=5><BR><form method=post action=addphoto.php><input type=hidden name=id value=$id><input type=submit name=submit value='change photo'></form><BR><form method=post action=delete_picture.php><input type=hidden name=id value=$id><input type=submit name=submit value='delete photo'></form><BR>\n";}echo "</td>\n";echo "<td>$category, $subcategory</td>\n\n";echo "<td><span class=smalladmintext>$preview...</span></td>\n";echo "<td><span class=smalladminauthortext>$author</span></td>\n";echo "<td><span class=red>$showorder</span></td>\n";echo "<td><span class=smalladminauthortext>\n";print theDate ("d F Y","$date"); echo "</span></td>\n";echo "<td><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>\n";echo "<td><form method=post action=delete.php><input type=hidden name=id value=$id><input type=submit name=submit value=delete></form></td>\n";echo "</tr>\n";echo "\n";}$e++; ?></table><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>