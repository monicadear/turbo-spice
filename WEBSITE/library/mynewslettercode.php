<BR><BR>
<table border=0 cellspacing=0 cellpadding=5 width=480><tr>
<?

include ("../codes/adminconfig.php");


echo "<td valign=top>\n";

	if (isset($thumbnaildown) && $thumbnaildown !=="") {
	echo "<a href=/newsletters/$filenamedown class=pretty><img src=/newsletters/thumbnails/$thumbnaildown alt='$titledown' border=0 width=100 height=129 class=pretty></a><BR>";
	}

	else {
	}

	if (isset($filenamedown) && $filenamedown !=="") {
echo "<a href=/newsletters/$filenamedown>$titledown</a><BR>";
	}

	else {
echo "$titledown<BR>";
	}


	if (isset($textdown) && $textdown !=="") {

echo "$textdown\n";
}
	else {
}


echo "</td>\n";



	if ($t==4)  {
	echo "</tr>\n<tr>";
	$t=0;

	}


}