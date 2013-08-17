<?
$pid=$_REQUEST['pid'];


if (isset($pid)) {
$query= "SELECT * FROM allphotosextended where pid='$pid'"; 
}

else {
$query= "SELECT * FROM allphotosextended where pid=2"; 
}

 include ("../codes/adminconfig.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$c=1;

while ($myrow = mysql_fetch_array($sql_result)){ 
                   $pid=$myrow["pid"];	
                   $titlepg=$myrow["title"];
                   $textpg=$myrow["description"];
                   $picture1pg=$myrow["picture1"];
                   $picture2pg=$myrow["picture2"];
                   $picture3pg=$myrow["picture3"];
                   $picture4pg=$myrow["picture4"];
                   $picture5pg=$myrow["picture5"];
                   $picture6pg=$myrow["picture6"];
                   $picture7pg=$myrow["picture7"];
                   $picture8pg=$myrow["picture8"];

$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";
$transpg["\n"] = "<BR>";
$textpg = strtr($textpg,$transpg); 
$textpg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $textpg);
$textpg = ereg_replace("\r\n", "\n<BR>", $textpg);

$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);

$trans5[" "] = "_"; 
$trans5["'"] = "_";
$trans5["&quote;"] = "_";
$nametopass = strtr($titlepg,$trans5); 



$photogallerynametopass="Website".$pid;
}
?>




<SCRIPT language="JavaScript" type="text/javascript">


function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}



function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}

	}

}



var preloadFlag = false;

function preloadImages() {

	if (document.images) {


<? if(isset($picture1pg) && $picture1pg !=="") {
		echo "gallery_main_over = newImage('/photogallery/$picture1pg');";
}
 else {
		echo "gallery_main_over = newImage('/photogallery/imgcomingsoon.jpg');";
}
?>

<? if(isset($picture2pg) && $picture2pg !=="") {
		echo "picture_2_over = newImage('/photogallery/$picture2pg');";
}
 else {
		echo "picture_2_over = newImage('/photogallery/$picture1pg');";
}
?>


<? if(isset($picture3pg) && $picture3pg !=="") {
		echo "picture_3_over = newImage('/photogallery/$picture3pg');";
}
 else {
		echo "picture_3_over = newImage('/photogallery/$picture1pg');";
}
?>

<? if(isset($picture4pg) && $picture4pg !=="") {
		echo "picture_4_over = newImage('/photogallery/$picture4pg');";
}
 else {
		echo "picture_4_over = newImage('/photogallery/$picture1pg');";
}
?>

<? if(isset($picture5pg) && $picture5pg !=="") {
		echo "picture_5_over = newImage('/photogallery/$picture5pg');";
}
 else {
		echo "picture_5_over = newImage('/photogallery/$picture1pg');";
}
?>

<? if(isset($picture6pg) && $picture6pg !=="") {
		echo "picture_6_over = newImage('/photogallery/$picture6pg');";
}
 else {
		echo "picture_6_over = newImage('/photogallery/$picture1pg');";
}
?>

<? if(isset($picture7pg) && $picture7pg !=="") {
		echo "picture_7_over = newImage('/photogallery/$picture7pg');";
}
 else {
		echo "picture_7_over = newImage('/photogallery/$picture1pg');";
}
?>

<? if(isset($picture8pg) && $picture8pg !=="") {
		echo "picture_8_over = newImage('/photogallery/$picture8pg');";
}
 else {
		echo "picture_8_over = newImage('/photogallery/$picture1pg');";
}
?>

		preloadFlag = true;
	}
}

// -->
</SCRIPT>
<!-- End Preload Script -->


<script language = "JavaScript" type="text/javascript">preloadImages();</script>

<?
echo "<BR>";
echo "<h3>$titlepg</h3>";
echo "$textpg<BR>";
echo "<br>";







if (isset($picture2pg) && $picture2pg !== "") {


echo "<table border=0 cellspacing=0 cellpadding=0 align=center>";
echo "<tr>";

echo "<td valign=top height=44>";


if (isset($picture2pg) && $picture2pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture2pg\" ONMOUSEOVER=\"changeImages('picture_2', '/photogallery/$picture2pg', 'gallery_main', '/photogallery/$picture2pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_2', '/photogallery/$picture2pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture2pg width=45 height=28 border=0 name=picture_2></a> \n";
}

else {
echo "";
}


if (isset($picture3pg) && $picture3pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture3pg\" ONMOUSEOVER=\"changeImages('picture_3', '/photogallery/$picture3pg', 'gallery_main', '/photogallery/$picture3pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_3', '/photogallery/$picture3pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture3pg width=45 height=28 border=0 name=picture_3></a> \n";
}

else {
echo "";
}

if (isset($picture4pg) && $picture4pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture4pg\" ONMOUSEOVER=\"changeImages('picture_4', '/photogallery/$picture4pg', 'gallery_main', '/photogallery/$picture4pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_4', '/photogallery/$picture4pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture4pg width=45 height=28 border=0 name=picture_4></a> \n";
}

else {
echo "";
}

if (isset($picture5pg) && $picture5pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture5pg\" ONMOUSEOVER=\"changeImages('picture_5', '/photogallery/$picture5pg', 'gallery_main', '/photogallery/$picture5pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_5', '/photogallery/$picture5pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture5pg width=45 height=28 border=0 name=picture_5></a> \n";
}

else {
echo "";
}

if (isset($picture6pg) && $picture6pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture6pg\" ONMOUSEOVER=\"changeImages('picture_6', '/photogallery/$picture6pg', 'gallery_main', '/photogallery/$picture6pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_6', '/photogallery/$picture6pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture6pg width=45 height=28 border=0 name=picture_6></a> \n";
}

else {
echo "";
}

if (isset($picture7pg) && $picture7pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture7pg\" ONMOUSEOVER=\"changeImages('picture_7', '/photogallery/$picture7pg', 'gallery_main', '/photogallery/$picture7pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_7', '/photogallery/$picture7pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture7pg width=45 height=28 border=0 name=picture_7></a> \n";
}

else {
echo "";
}


if (isset($picture8pg) && $picture8pg !=="") {
echo "<A HREF=\"details_large.php?pid=$pid#$picture8pg\" ONMOUSEOVER=\"changeImages('picture_8', '/photogallery/$picture8pg', 'gallery_main', '/photogallery/$picture8pg'); return true;\" ONMOUSEOUT=\"changeImages('picture_8', '/photogallery/$picture8pg', 'gallery_main', '/photogallery/$picture1pg'); return true;\">";
echo "<img src=/photogallery/$picture8pg width=45 height=28 border=0 name=picture_8></a> \n";
}

else {
echo "";
}




echo "</td>";
echo "</tr>";

echo "</table>";

}
$c++;

?>




<?
if ($picture1pg=="" || $picture1pg==null) {
echo "<div align=center><img src=/photogallery/imgcomingsoon.jpg width=320 border=0></div>";
} else {
echo "\n<div align=center><a href=details_large.php?pid=$pid><img src=/photogallery/$picture1pg width=320 border=0 name='gallery_main'></a></div>";
}

?>


<BR><span class=caption>Click the photo to read the caption.</span><BR>


