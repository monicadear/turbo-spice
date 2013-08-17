<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("pagecontent_nav.php"); ?><h1>Admin: Page Content Edit</h1><p><B>You may edit these main pages within the site.</B></p><table border=1 width=100%>
<tr>
<td>Title</td>
</tr><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM pagecontent order by category"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];					                      $date=$myrow["date"];                   $category=$myrow["category"];                   $subcategory=$myrow["subcategory"];                   $title=$myrow["title"];                   $titleshow=$myrow["titleshow"];                   $text=$myrow["text"];                   $author=$myrow["author"];                   $picture1=$myrow["picture1"];                   $picture2=$myrow["picture2"];                   $showorder=$myrow["showorder"];$pos = strpos($text,"&lt;BR&gt;&lt;BR&gt;"); $preview = substr($text,0,$pos-5); $trans5["&lt;b&gt;"]= "<b>";$trans5["&lt;/b&gt;"]= "</b>";$trans5["&lt;i&gt;"]= "<i>";$trans5["&lt;/i&gt;"]= "</i>";$trans5["&lt;BR&gt;"]= "<BR>";$preview = strtr($preview,$trans5);

echo "<tr>";
echo "<td>\n";

if ( isset($subcategory) && $subcategory=="1") 

{
echo "<b><i>$titleshow</i></b>\n";
} 

else  if ( isset($subcategory) && $subcategory=="2") 
{
echo "&nbsp; &nbsp;<b><i>$titleshow</i></b>\n";
}

else  if ( isset($subcategory) && $subcategory=="3") 
{
echo " - $titleshow\n";
}

else  if ( isset($subcategory) && $subcategory=="4") 
{
echo " + $titleshow\n";
}


else  
{
echo "&nbsp; &nbsp; &nbsp; * $titleshow\n";
}


echo "$id";
echo "</td>";
echo "</tr>\n";
echo "\n";}$e++; ?></table><?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>