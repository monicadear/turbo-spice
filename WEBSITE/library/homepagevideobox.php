<div id=homepagevideobox>


<?
 include ("../codes/adminconfig.php"); 

$dbvideos = "videos";$queryvideos = "select * from $dbvideos where category=1 order by rand() limit 1";$sql_resultvideos = mysql_query($queryvideos, $connection) or die ("Couldn't execute query. Please try again later"); $j=0;while ($myrowvideos = mysql_fetch_array($sql_resultvideos)){                    $titlevideos=$myrowvideos["title"];                   $textvideos=$myrowvideos["text"];                   $weblinkvideos=$myrowvideos["weblink"];$transvideos["&amp;"] = "&"; $transvideos["&#039;"] = "'";$transvideos["&lt;"] = "<";$transvideos["&gt;"] = ">";$transvideos["&lt;input"] = "input_";$textvideos = strtr($textvideos,$transvideos); $titlevideos = strtr($titlevideos, $transvideos);

$translinkliteration["watch?v="] = "/v/";
$weblinkvideos = strtr($weblinkvideos, $translinkliteration);
$weblinkvideosshow = "http://"."".$weblinkvideos;





if ($weblinkvideos !== ""){
echo "<object width=277 height=225><param name=movie value='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=277 height=225></embed></object>";


}

else {
echo "<object width=277 height=225><param name=movie value='http://www.youtube.com/v/s6qQCf4mpXU&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='http://www.youtube.com/v/s6qQCf4mpXU&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=277 height=225></embed></object>";
}


}$j++; 
?>

</div>