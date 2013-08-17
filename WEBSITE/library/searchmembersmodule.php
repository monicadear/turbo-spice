<script language = "JavaScript" type="text/javascript">

<!--

//

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 

//-->
</script>

<div id=searchbutton><BR><form name=search method='post' action='/pages/membersearchresults.php'>
<input type='text' name='keyword' value='<?php $keyword="search members for..."; echo "$keyword";?>' size='20' onFocus=clearText(this)><input type='hidden' name='results' value='15'><input type='image' src='/images/searchbutton.gif' value='Search' border='0' width='25' align='right' alt='search'></form></div>
<BR>


