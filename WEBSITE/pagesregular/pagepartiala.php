

<?$result1pagecontent = mysql_db_query($database, $query1pagecontent);while($rowpc = mysql_fetch_object($result1pagecontent)) {$transpc["&amp;"] = "&"; $transpc["&#039;"] = "'";$transpc["&quot;"] = "'";$transpc["&lt;"] = "<";$transpc["&gt;"] = ">";


$textpc = strtr($rowpc->text,$transpc); $titlepc = strtr($rowpc->title, $transpc);$picturemainpc = $rowpc->picture1; $picturesecpc = $rowpc->picture2; $category = $rowpc->category;$subcategory = $rowpc->subcategory;$date = $rowpc->date;$author = $rowpc->author;


$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {
$string = "<span class=redbackground>".$keywords."</span>";
$titlepc = ereg_replace($keywords,$string, $titlepc);
$textpc = ereg_replace($keywords,$string, $textpc);
}
else {
}


echo "<div id=sidebar>\r\n";
include ("../library/searchmodule.php");
echo "  <div id=relatedpagescontent>\r\n";



include ("../library/display_this_category.php");

include ("../codes/adminconfig.php");
$dbpagecontentsub = "pagecontent";$query1pagecontentsub = "select * from $dbpagecontentsub where publish='Y' and category = '$category' and subcategory=5  order by showorder";$result1pagecontentsub = mysql_db_query($database, $query1pagecontentsub);while($rowpcsub = mysql_fetch_object($result1pagecontentsub)) {$idpageshow = $rowpcsub->id;$catpageshow = $rowpcsub->category;$showtitlecategory = strtr($rowpcsub->titleshow, $transpc);

if (isset($showtitlecategory) && $showtitlecategory !== "") {

	if ($idpageshow==$pageid) {
	echo "<span class=toplevelrelatedselect>$showtitlecategory</span><BR>\n";
	}

	else {
	echo "<a href=/pages/main.php?pageid=$idpageshow&pagecategory=$catpageshow class=toplevelrelated>$showtitlecategory</a><BR>\n";
	}

							}

else if ($showtitlecategory=="" || $showtitlecategory== null) {
	echo "\n";
							}


	}




// ADD A CONSTANT CONTACT BOX

include ("../library/constantcontactsidebarblock.php");

echo "</div>";
echo "</div>\r\n\r\n";

?>



<?



echo "<div id=pagecontentindent>\r";

echo "<div id=pagecontentindenttext>\r";

echo "<a name=top></a>\r";

echo "<h1>$titlepc</h1>\r";

include ("../library/addthiscode.php");



if($session->isAdmin()){
echo "<div align=right>";
echo "<a href=/myadmin/pageupdates/update.php?id=$idpc>Edit this page.</a><BR>";
echo "</div>";
}



if ($picturemainpc == "") {echo "";}
 else if (isset($picturemainpc)) {echo "<div align=right><img src=/pageimages/$picturemainpc border=0 width=350 hspace=5 vspace=5></div><BR>\r";}if ($picturesecpc == "") {echo "";} else if (isset($picturesecpc)) {echo "<div align=right><img src=/pageimages/$picturesecpc border=0 width=250 hspace=5 vspace=5></div><BR>\r";}


if ($subcategory == 3 || $subcategory == 7 || $subcategory == 8) 
{
echo "Please login to see members-only information.\r";
}

else {
echo "$textpc\r\r\r\r\r";
}


}

?>



<BR>
<div align=right>
<a href=#top>top of page</a>
</div>
<BR>


