<script language = "JavaScript" type="text/javascript">

<!--

//

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 

//-->
</script>


<?

$ea= $_REQUEST['ea'];

	if (isset($ea) && $ea == "") {
$ea = $ea;
}
else {
$ea="you@email.com";
}

?>

<!-- BEGIN: Constant Contact Bubble Opt-in Email List Form -->
<div align="center">
<form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:3;">

<font style="font-weight: normal; font-family:Arial; font-size:10px; color:#000000;">enter your e-mail address:</font> <input type="text" name="ea" size="14" value="<?echo "$ea";?>" onFocus=clearText(this) style="font-family: Arial; font-size:10px; border:1px solid #999999;">&nbsp;<input type="submit" name="go" value="Join" class="submit"  style="font-family:Arial,Helvetica,sans-serif; font-size:11px;">
<input type="hidden" name="m" value="#">
<input type="hidden" name="p" value="oi">
</form>
</div>
<!-- END: Constant Contact Bubble Opt-in Email List Form -->