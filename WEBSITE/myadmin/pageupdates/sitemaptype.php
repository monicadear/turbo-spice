<? include ("../adminheader.php"); ?>
<tr>
<td>Title</td>
</tr>

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

echo "</tr>\n";
echo "\n";