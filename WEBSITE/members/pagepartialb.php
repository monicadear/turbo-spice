
<?
$id= $rowpc->id;


$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {
$string = "<span class=redbackground>".$keywords."</span>";
$titlepc = ereg_replace($keywords,$string, $titlepc);
$textpc = ereg_replace($keywords,$string, $textpc);
}
else {
}




<?



echo "<div id=relatedpagescontent>";

include ("../library/display_this_category.php");

include ("../codes/adminconfig.php");
$dbpagecontentsub = "pagecontent";

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









echo "<div id=pagecontentindenttext>";

echo "<a name=top></a>";

?>




<?
echo "<h1>$titlepc</h1>";


if($session->userlevel >= 2)
{
echo "$textpc";
}

else {
echo "Please login to see members-only information.";
}


echo "<BR>";
