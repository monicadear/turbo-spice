
<?$result1pagecontent = mysql_db_query($database, $query1pagecontent);while($rowpc = mysql_fetch_object($result1pagecontent)) {$transpc["&amp;"] = "&"; $transpc["&#039;"] = "'";$transpc["&quot;"] = "'";$transpc["&lt;"] = "<";$transpc["&gt;"] = ">";$transpc["&quot;"] = "'";
$id= $rowpc->id;$textpc = strtr($rowpc->text,$transpc); $titlepc = strtr($rowpc->title, $transpc);$picturemainpc = $rowpc->picture1; $picturesecpc = $rowpc->picture2; $category = $rowpc->category;$subcategory = $rowpc->subcategory;$date = $rowpc->date;$author = $rowpc->author;


$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {
$string = "<span class=redbackground>".$keywords."</span>";
$titlepc = ereg_replace($keywords,$string, $titlepc);
$textpc = ereg_replace($keywords,$string, $textpc);
}
else {
}
?>



<?



echo "<div id=relatedpagescontent>";

include ("../library/display_this_category.php");

include ("../codes/adminconfig.php");
$dbpagecontentsub = "pagecontent";$query1pagecontentsub = "select * from $dbpagecontentsub where publish='Y' and category = '$category' and subcategory=5  order by showorder";$result1pagecontentsub = mysql_db_query($database, $query1pagecontentsub);while($rowpcsub = mysql_fetch_object($result1pagecontentsub)) {$idpageshow = $rowpcsub->id;$catpageshow = $rowpcsub->category;$showtitlecategory = strtr($rowpcsub->titleshow, $transpc);

if (isset($showtitlecategory) && $showtitlecategory !== "") {

if ($idpageshow==$pageid) {
echo "<span class=toplevelrelatedselect>$showtitlecategory</span> &#124; \n";
}


else {
echo "<a href=/pages/main.php?pageid=$idpageshow&pagecategory=$catpageshow class=toplevelrelated>$showtitlecategory</a> &#124; \n";
}


}




else if ($showtitlecategory=="" || $showtitlecategory== null) {
echo "\n";
}

}



echo "</div><BR>";







echo "<div id=pagecontentindent>";

echo "<div id=pagecontentindenttext>";

echo "<a name=top></a>";

?>




<?
echo "<h1>$titlepc</h1>";
if ($picturemainpc == "") {echo "";} else if (isset($picturemainpc)) {echo "<div align=center><img src=/pageimages/$picturemainpc border=0 width=500 vspace=2 hspace=5></div><BR>";}if ($picturesecpc == "") {echo "";} else if (isset($picturesecpc)) {echo "<img src=/pageimages/$picturesecpc border=0 width=150 align=right hspace=5 vspace=5><BR>";}

if($session->userlevel >= 2)
{
echo "$textpc";
}

else {
echo "Please login to see members-only information.";
}


echo "<BR>";
}?>