
<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<tr>
<td></td>
<td><a href=viewall.php?sort=titleshow&lastsort=<?echo"$sort"?>>Title</a></td>
<td>Photos</td>
<td><a href=viewall.php?sort=category&lastsort=<?echo"$sort"?>>Category</a></td>
<td><a href=viewall.php?sort=category2&lastsort=<?echo"$sort"?>>Flyout Family?</a></td>
<td><a href=viewall.php?sort=subcategory&lastsort=<?echo"$sort"?>>Type</a></td>
<td></td><td>Preview</td>
<td>Order</td>
<td>Pub?</td>
<td><a href=viewall.php?sort=dateupdated&lastsort=<?echo"$lastsort"?>>Last updated</td>
<td></td>
</tr>


                   $subcategory=$myrow["subcategory"];
$trans5["a name"]= "-a n/ ame";


/// IF PUBLISHED, then make available
	if ($publish==Y) {

		if ($category==1) {echo "<tr bgcolor=#FFFFFF>";}
		else if ($category==2) {echo "<tr bgcolor=#669900>";}
		else if ($category==3) {echo "<tr bgcolor=#996600 >";}
		else if ($category==4) {echo "<tr bgcolor=#FF6600>";}
		else if ($category==5) {echo "<tr bgcolor=#FFCC00>";}
		else if ($category==6) {echo "<tr bgcolor=#993366>";}
		else if ($category==7) {echo "<tr bgcolor=#CC3333>";}
		else if ($category==8) {echo "<tr bgcolor=#99CCFF>";}
		else if ($category==9) {echo "<tr bgcolor=#CC9999>";}
		else if ($category==10) {echo "<tr bgcolor=#669999>";}
		else if ($category==11) {echo "<tr bgcolor=#FF33CC>";}
		else if ($category==12) {echo "<tr bgcolor=#CCFF66>";}

		else {	echo "<tr bgcolor=#FFFFFF>"; }

	}

/// IF HIDDEN, then make the row grayed out
	else {
	echo "<tr bgcolor=#CCCCCC>";
	}


echo "<td valign=top>$id</td>";
echo "<td width=20% valign=top>";
echo "<b>$titleshow:</b><BR><i>$title</i> <a href=/pages/main.php?pageid=$id&pagecategory=$category target=new><img src=/images/spyglass.gif border=0 width=25></a></td>\n";
echo "<td valign=top>";
echo "<font color=blue>$category</font>\n";


include ("producttypelistdisplay_category.php");


echo "</td>\n";

echo "<td>\n";
echo "$category2";
echo "</td>\n";


if ($subcategory=="3" || $subcategory=="7") {
echo "<td valign=top bgcolor=#0000FF>\n";
}

else if ($subcategory=="8") {
echo "<td valign=top bgcolor=#00FF00>\n";
}

else {
echo "<td valign=top>\n";
}


echo "<font color=blue>$subcategory</font>\n";


if (isset($subcategory) && $subcategory !=="") {
include ("producttypelistdisplay_subcategory.php");
}
 

echo "<td valign=top><form method=post action=update.php><input type=hidden name=id value=$id><input type=submit name=submit value=update></form></td>";
echo "<td valign=top><span class=smalladmintext>$preview...</span>\n";
echo "<BR><BR>\n";
echo "<span class=linkbrown>COPY AND PASTE A LINK TO THIS PAGE:</span><BR>\n";
echo "<textarea onClick='javascript: this.focus(); this.select();' rows='4' cols='40' readonly><a href=$websitefullurl/pages/main.php?pageid=$id&pagecategory=$category>$titleshow</a></textarea>";
echo "</td>\n\n";
echo "<td valign=top><span class=red>$showorder</span></td>\n";

echo "<td valign=top>$publish</td>\n";


echo "\n";

<? }
?>