<?
// NOTE: Please search for # and replace with your actual Constant Contact id -- find in the "generate a form for your website" or call tech support
?>


<script language = "JavaScript" type="text/javascript">

<!--

//

function clearText2(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 

//-->
</script>

<SCRIPT LANGUAGE="JavaScript"><!--function Whoops() {if (document.ccoptin.ea.value=="you@website.com") {     alert("Please fill in your actual e-mail address. We keep your information private.");		return false; }     else { return true; }}// --></SCRIPT>


<?


$enewslettersignup= $_REQUEST['enewslettersignup'];
$pageid= $_REQUEST['pageid'];

	if (isset($enewslettersignup) && $enewslettersignup == "") {
$enewslettersignup = $enewslettersignup;
}
else {
$enewslettersignup="you@email.com";
}

if ($pageid==33) 
{
}
else {
echo "<div id=constantcontactsidebar>";
echo "<div id=sidebarbox>\n";
echo "<div align=left>\n";
echo "<form name=ccoptin action=http://visitor.constantcontact.com/d.jsp target=_blank method=post ONSUBMIT='return Whoops()';>\n
<input type=text name=ea size=15 value='$enewslettersignup'
onFocus=clearText2(this)> <input type=submit name=go value=Join>\n
<input type=hidden name=m value=#>
<input type=hidden name=p value=oi>";
echo "</form>\n";
echo "</div>\n";
echo "</div>\n";
echo "</div>\n";
}
?>
