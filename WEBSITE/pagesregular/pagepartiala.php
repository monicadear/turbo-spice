

<?


$textpc = strtr($rowpc->text,$transpc); 


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
$dbpagecontentsub = "pagecontent";

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





echo "<div id=pagecontentindenttext>\r";

echo "<a name=top></a>\r";

echo "<h1>$titlepc</h1>\r";

include ("../library/addthiscode.php");



if($session->isAdmin()){
echo "<div align=right>";
echo "<a href=/myadmin/pageupdates/update.php?id=$idpc>Edit this page.</a><BR>";
echo "</div>";
}







if ($subcategory == 3 || $subcategory == 7 || $subcategory == 8) 
{
echo "Please login to see members-only information.\r";
}

else {
echo "$textpc\r\r\r\r\r";
}








<BR>
<div align=right>
<a href=#top>top of page</a>
</div>
<BR>

