<div id=homepagevideobox>


<?


$dbvideos = "videos";

$translinkliteration["watch?v="] = "/v/";
$weblinkvideos = strtr($weblinkvideos, $translinkliteration);
$weblinkvideosshow = "http://"."".$weblinkvideos;





if ($weblinkvideos !== "")
echo "<object width=277 height=225><param name=movie value='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=277 height=225></embed></object>";


}

else {
echo "<object width=277 height=225><param name=movie value='http://www.youtube.com/v/s6qQCf4mpXU&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='http://www.youtube.com/v/s6qQCf4mpXU&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=277 height=225></embed></object>";
}


}


</div>