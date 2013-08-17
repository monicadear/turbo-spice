<?

$query= "SELECT * FROM allphotosextended order by pid desc limit 1"; 

 include ("../codes/adminconfig.php"); 

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql_result = mysql_query($query, $connection) or die ("Go to the <a href=/>homepage</a>.<BR>"); 

$c=1;

while ($myrow = mysql_fetch_array($sql_result)){ 
                   $pid=$myrow["pid"];	
                   $titlepg=$myrow["title"];
                   $textpg=$myrow["description"];
                   $thumbpg=$myrow["thumbnail"];
                   $picture1pg=$myrow["picture1"];
                   $picture1description=$myrow["picture1description"];
                   $picture2pg=$myrow["picture2"];
                   $picture2description=$myrow["picture2description"];
                   $picture3pg=$myrow["picture3"];
                   $picture3description=$myrow["picture3description"];
                   $picture4pg=$myrow["picture4"];
                   $picture4description=$myrow["picture4description"];
                   $picture5pg=$myrow["picture5"];
                   $picture5description=$myrow["picture5description"];
                   $picture6pg=$myrow["picture6"];
                   $picture6description=$myrow["picture6description"];
                   $picture7pg=$myrow["picture7"];
                   $picture7description=$myrow["picture7description"];
                   $picture8pg=$myrow["picture8"];
                   $picture8description=$myrow["picture8description"];
                   $authorpg=$myrow["author"];

$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";
$transpg["\n"] = "<BR>";
$textpg = strtr($textpg,$transpg); 
$textpg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $textpg);
$textpg = ereg_replace("\r\n", "\n<BR>", $textpg);

$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);

$titlepg=strtolower($titlepg);


$trans5[" "] = "_"; 
$trans5["'"] = "_";
$trans5["&quote;"] = "_";
$nametopass = strtr($titlepg,$trans5); 

$transdescription["\n"] = "";
$transdescription["  "] = "";
$transdescription["&lt;BR&gt;"] = "<BR>";
$transdescription["&lt;em&gt;"] = "<em>";
$transdescription["&lt;/em&gt;"] = "</em>";
$transdescription["("] = "&#40;";
$transdescription[")"] = "&#41;";
$transdescription["&#039;"] = "&#39;";
$picture1description = strtr($picture1description,$transdescription);
$picture2description = strtr($picture2description,$transdescription);
$picture3description = strtr($picture3description,$transdescription);
$picture4description = strtr($picture4description,$transdescription);
$picture5description = strtr($picture5description,$transdescription);
$picture6description = strtr($picture6description,$transdescription);
$picture7description = strtr($picture7description,$transdescription);
$picture8description = strtr($picture8description,$transdescription);



$photogallerynametopass="Website".$pid;

?>




<SCRIPT language="JavaScript" type="text/javascript">



	if (document.images) {


<? if(isset($picture1pg) && $picture1pg !=="") {
		echo "image0 = new Image;\n";
		echo "image0.src = '/photogallery/$picture1pg';";
}
 else {
		echo "image0 = new Image;\n";
		echo "image0.src = '/photogallery/imgcomingsoon.jpg';";
}
?>

<? if(isset($picture2pg) && $picture2pg !=="") {
		echo "image1 = new Image;\n";
		echo "image1.src = '/photogallery/$picture2pg';";
}
 else {
		echo "image1 = new Image;\n";
		echo "image1.src = '/photogallery/$picture1pg';";
}
?>

<? if(isset($picture3pg) && $picture3pg !=="") {
		echo "image2 = new Image;\n";
		echo "image2.src = '/photogallery/$picture3pg';";
}
 else {
		echo "image2 = new Image;\n";
		echo "image2.src = '';";
}
?>

<? if(isset($picture4pg) && $picture4pg !=="") {
		echo "image3 = new Image;\n";
		echo "image3.src = '/photogallery/$picture4pg';";
}
 else {
		echo "image3 = new Image;\n";
		echo "image3.src = '';";
}
?>

<? if(isset($picture5pg) && $picture5pg !=="") {
		echo "image4 = new Image;\n";
		echo "image4.src = '/photogallery/$picture5pg';";
}
 else {
		echo "image4 = new Image;\n";
		echo "image4.src = '';";
}
?>

<? if(isset($picture6pg) && $picture6pg !=="") {
		echo "image5 = new Image;\n";
		echo "image5.src = '/photogallery/$picture6pg';";
}
 else {
		echo "image5 = new Image;\n";
		echo "image5.src = '';";
}
?>

<? if(isset($picture7pg) && $picture7pg !=="") {
		echo "image6 = new Image;\n";
		echo "image6.src = '/photogallery/$picture7pg';";
}
 else {
		echo "image6 = new Image;\n";
		echo "image6.src = '';";
}
?>

<? if(isset($picture8pg) && $picture8pg !=="") {
		echo "image7 = new Image;\n";
		echo "image7.src = '/photogallery/$picture8pg';";
}
 else {
		echo "image7 = new Image;\n";
		echo "image7.src = '';";
}
?>



} else {

}

var cap = 
[

<?
if(isset($picture1description) && $picture1description !=="") {
	echo "'$picture1description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture2description) && $picture2description !=="") {
	echo "'$picture2description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture3description) && $picture3description !=="") {
	echo "'$picture3description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture4description) && $picture4description !=="") {
	echo "'$picture4description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture5description) && $picture5description !=="") {
	echo "'$picture5description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture6description) && $picture6description !=="") {
	echo "'$picture6description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture7description) && $picture7description !=="") {
	echo "'$picture7description',\n";
	}
		else {
	echo "'',\n";
	}
?>
<?
if(isset($picture8description) && $picture8description !=="") {
	echo "'$picture8description'\n";
	}
		else {
	echo "''\n";
	}
?>
];

function rollover(n) {
document.rollimg.src = window['image'+n].src;
document.getElementById('caption').innerHTML = cap[n];
}

// -->
</SCRIPT>
<!-- End Preload Script -->



<?

echo "<span class=toptitlegreen>";
echo "this month ";
echo "</span>";

echo "<span class=toptitlered>";
echo "$titlepg";
echo "</span> ";


echo "<BR><BR>";


echo "<a href=details_large.php?pid=$pid><img src=/thumbs/$thumbnailpg border=0 align=left class=alignleft></a>";

echo "$textpg<BR>";
echo "<br>";







echo "<BR clear=all>";
echo "<table border=0 cellspacing=0 cellpadding=0>";
echo "<tr>";

echo "<td valign=top height=55>";

/// Create Thumbnail Row

if (isset($picture2pg) && $picture2pg !=="") {
echo "<span onmouseover=\"rollover(1)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture2pg\">";
echo "<img src=/photogallery/$picture2pg width=50 height=50 border=0 name=picture_2></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture3pg) && $picture3pg !=="") {
echo "<span onmouseover=\"rollover(2)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture3pg\">";
echo "<img src=/photogallery/$picture3pg width=50 height=50 border=0 name=picture_3></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture4pg) && $picture4pg !=="") {
echo "<span onmouseover=\"rollover(3)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture4pg\">";
echo "<img src=/photogallery/$picture4pg width=50 height=50 border=0 name=picture_4></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture5pg) && $picture5pg !=="") {
echo "<span onmouseover=\"rollover(4)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture5pg\">";
echo "<img src=/photogallery/$picture5pg width=50 height=50 border=0 name=picture_5></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture6pg) && $picture6pg !=="") {
echo "<span onmouseover=\"rollover(5)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture6pg\">";
echo "<img src=/photogallery/$picture6pg width=50 height=50 border=0 name=picture_6></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture7pg) && $picture7pg !=="") {
echo "<span onmouseover=\"rollover(6)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture7pg\">";
echo "<img src=/photogallery/$picture7pg width=50 height=50 border=0 name=picture_7></a> \n";
echo "</span>";
}

else {
echo "";
}

if (isset($picture8pg) && $picture8pg !=="") {
echo "<span onmouseover=\"rollover(7)\">";
echo "<A HREF=\"details_large.php?pid=$pid#$picture8pg\">";
echo "<img src=/photogallery/$picture8pg width=50 height=50 border=0 name=picture_8></a> \n";
echo "</span>";
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
echo "<BR>";
echo "<div id=showlocalartist>";
echo "<table border=0 cellspacing=0 cellpadding=0 width=450>";
echo "<tr>";

echo "<td valign=top width=325>";


if ($picture1pg=="" || $picture1pg==null) {
		echo "<a href=details_large.php?pid=$pid><img src=/photogallery/imgcomingsoon.jpg width=320 border=0 name=rollimg></a>";
	} else {
		echo "\n<a href=details_large.php?pid=$pid><img src=/photogallery/$picture1pg width=320 border=0 name='rollimg'></a>";
	}
	
echo "<td>";
echo "<td valign=top>";
echo "<BR><BR>\n";
echo "<b>$titlepg</b>\n";
echo "<BR>\n";
echo "$authorpg\n";
echo "<span id=caption>Grow Your Oakland Featured Artist</span>";
echo "";

echo "</td></tr></table>";
?>


</div>

