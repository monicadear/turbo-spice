<BR><BR>
<table border=0 cellspacing=0 cellpadding=5 width=480><tr>
<?

include ("../codes/adminconfig.php");$dbdown = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querydown= "SELECT * FROM newsletters order by showorder desc"; $sql_resultdown = mysql_query($querydown, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowdown = mysql_fetch_array($sql_resultdown)){                    $iddown=$myrowdown["id"];					                      $datedown=$myrowdown["date"];                   $titledown=$myrowdown["title"];                   $textdown=$myrowdown["text"];                   $thumbnaildown=$myrowdown["thumbnail"];                   $filenamedown=$myrowdown["filename"];$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&quot;"] = "'";$textdown = strtr($textdown,$trans); $transthumbnail["http://"] = "";$thumbnaildown = strtr($thumbnaildown, $transthumbnail);


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


echo "</td>\n";$t++; 



	if ($t==4)  {
	echo "</tr>\n<tr>";
	$t=0;

	}


}echo "</tr></table>";echo "<BR>";