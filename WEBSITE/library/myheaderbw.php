<?
/// PUT IN ALL VARIABLES from beginning of myheader.php

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<head>
<title><? echo "$nameoforg $basewebsite"; ?></title>
<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="/stylebw.css">
<meta HTTP-EQUIV="expires" CONTENT="0">
<meta HTTP-EQUIV="Pragma" CONTENT="cache">
<meta name="author" content="CASBA">
<meta name="keywords" content="<?echo "$metakeywords";?>">
<meta name="description" content="<?echo "$metadescription";?>">
<meta name="resource-type" content="document">
<meta http-equiv="pragma" content="no-cache">
<meta name="revisit-after" content="15 days">
<meta name="classification" content="Design">
<meta name="robots" content="ALL">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="copyright" content="Owner">
<meta name="author" content="CASBA">
<meta name="language" content="English">
<meta name="doc-type" content="Public">
<meta name="doc-class" content="Living Document">
<meta name="doc-rights" content="Public">

<script type="text/javascript"><!--//--><![CDATA[//><!--startList = function() {	if (document.all&&document.getElementById) {		navRoot = document.getElementById("nav");		for (i=0; i<navRoot.childNodes.length; i++) {			node = navRoot.childNodes[i];			if (node.nodeName=="LI") {				node.onmouseover=function() {					this.className+=" over";				}				node.onmouseout=function() {					this.className=this.className.replace(" over", "");				}			}		}	}}window.onload=startList;//--><!]]></script><script type="text/javascript"><!--//--><![CDATA[//><!--sfHover = function() {	var sfEls = document.getElementById("nav").getElementsByTagName("LI");	for (var i=0; i<sfEls.length; i++) {		sfEls[i].onmouseover=function() {			this.className+=" sfhover";		}		sfEls[i].onmouseout=function() {			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");		}	}}if (window.attachEvent) window.attachEvent("onload", sfHover);//--><!]]></script>


<script>

/*
Clear default form value script- by JavaScriptKit.com
Featured on JavaScript Kit (http://javascriptkit.com)
Visit javascriptkit.com for 400+ free scripts!
*/

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 
</script>


<!-- End Preload Script -->


</head>

<body onload=runSlideShow() style="background: url('/images/brownbackground.jpg') #272115; background-repeat: repeat-all; background-position: top left;">

<? 
$pageid=$_REQUEST['pageid'];
$pagecategory=$_REQUEST['pagecategory'];
?>



