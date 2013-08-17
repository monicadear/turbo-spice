<div id=sidebarbox>
<script language = "JavaScript" type="text/javascript">

<!--

//

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 

//-->
</script>

<table border=0 cellspacing=0 cellpadding=0><tr><td valign=top width=45><h2 class=sidebar>Search</h2> &nbsp; &nbsp;</td><td valign=top><form name=search method='post' action='/pages/searchresults.php'><input type='text' name='keyword' value='<?php $keyword="keyword"; echo "";?>' size='15' height='5' onFocus=clearText(this) class=green><input type='hidden' name='results' value='10'></td><td valign=top><input type='image' src='/images/yellowbluearrow.jpg' value='Search' border='0' width='15' align='left' alt='search'></form></td></tr></table>

</div>


