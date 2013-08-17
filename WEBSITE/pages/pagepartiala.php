

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

include ("../library/loggedinmessage.php");


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
echo "<a href=/myadmin/pageupdates/update.php?id=$pageid>Edit this page.</a><BR>";
echo "</div>";
}



/// SHOW TWITTER 
	if ($pageid==1 && $pagecategory==1) {
	echo "<BR>
	<div id=twitter_div>
	<ul id=twitter_update_list></ul>
	<a href=http://twitter.com/ id=twitter-link><img src=/images/followme.png border=0 alt=follow align=right hspace=5></a>
	</div>";

echo "<div id=homepagesocialnetworks>\n";
 include ("../library/socialnetworksbuttons.php");
echo "</div>\n";



}

/// ELSE DO SOMETHING ELSE like a sample picture
	else {
	}



if ($picturemainpc == "") {echo "";}
 else if (isset($picturemainpc)) {echo "<img src=/pageimages/$picturemainpc border=0 width=210 hspace=5 vspace=5 align=right class=alignright><BR>\r";}if ($picturesecpc == "") {echo "";} else if (isset($picturesecpc)) {echo "<img src=/pageimages/$picturesecpc border=0 width=250 hspace=5 vspace=5 align=left class=alignleft><BR>\r";}


if ($subcategory == 3 || $subcategory == 7 || $subcategory == 8) 
{
echo "Please login to see members-only information.\r";
}

else {
echo "$textpc\r\r\r\r\r";
}


}

?>



<!-- Start of Flickr Badge -->

<style type="text/css">

#flickr_badge_source_txt {padding:0; font: 11px Arial, Helvetica, Sans serif; color:#666666;}

#flickr_badge_icon {display:block !important; margin:0 !important; border: 1px solid rgb(0, 0, 0) !important;}

#flickr_icon_td {padding:0 5px 0 0 !important;}

.flickr_badge_image {text-align:center !important;}

.flickr_badge_image img {border: 1px solid black !important;}

#flickr_www {display:block; padding:0 10px 0 10px !important; font: 11px Arial, Helvetica, Sans serif !important; color:#3993ff !important;}

#flickr_badge_uber_wrapper a:hover,

#flickr_badge_uber_wrapper a:link,

#flickr_badge_uber_wrapper a:active,

#flickr_badge_uber_wrapper a:visited {text-decoration:none !important; background:inherit !important;color:#3993ff;}

#flickr_badge_wrapper {}

#flickr_badge_source {padding:0 !important; font: 11px Arial, Helvetica, Sans serif !important; color:#666666 !important;}

</style>

<table id="flickr_badge_uber_wrapper" cellpadding="0" cellspacing="10" border="0"><tr><td><table cellpadding="0" cellspacing="10" border="0" id="flickr_badge_wrapper">

<tr>
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=5&display=random&size=t&layout=h&source=all_tag&tag=beach"></script>

</tr>

</table>
<a href="http://www.flickr.com/" id="flickr_www">www.<strong style="color:#3993ff">flick<span style="color:#ff1c92">r</span></strong>.com</a>
</td></tr></table>

<!-- End of Flickr Badge -->


<BR>
<div align=right>
<a href=#top>top of page</a>
</div>
<BR>


