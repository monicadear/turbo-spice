<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";

include ("../../library/logmein_members.php"); 


}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>



<!-- TinyMCE -->
<script type="text/javascript" src="/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->


<form method="post" action="update_handler.php">


$publish=$row->publish;

$category=$row->category;
$category2=$row->category2;
$editedby=$row->editedby;



echo "<select name=category>";
include ("producttypelist_category.php");
echo "</select>";


echo "</tr>";



echo "<td>";
if (isset($category2) && $category2 !=="") {

echo "<select name=category2>";
echo "<option value=''></option>";
echo " <span class=smalladmintext>(for flyout, if applicable)</span><BR>";
}

else {
echo "<input type=text name='category2' value='$category2' size=50>";
}

echo "</td></tr>";








echo "<tr><th>Type of Page:<BR></th><td>";


echo "<select name=subcategory>";
include ("producttypelist_subcategory.php");
echo "</select>";


echo "</td></tr>";









?>



<tr><td valign=top><b>text</b></td><td><span class=smalladmintext>Select the text, then use these buttons to format text:</span>	



<textarea name='text' id='text' rows=20 cols=60><?echo "$text";?></textarea>


		

</td></tr>


<?

echo "<tr><th width=50>Original author: </th><td>
$author

</td></tr>";

echo "<tr><th width=50>Your name: </th><td>
$session->username
<input type=hidden name='editedby' value='$session->username'>

</td></tr>";

echo "<tr><th width=50>Order: </th><td><input type=text name='showorder' value='$showorder' size=10>main menus ordered by page families<BR>
dropdown menus ordered by 'show order' choose 1-100</td></tr>";

echo "<tr><th width=50>Publish?: </th><td>";

if ($publish=='Y' || $publish=='y') {
echo "<input type=radio value=N name=publish> NO, not published &nbsp; &#124; <input type=radio value=Y name=publish checked> <b>YES, PUBLISHED</b>\n";
} 

else if ($publish=='N'|| $publish=='n' || $publish=='') {
echo "<input type=radio value=N name=publish checked> <b>NOT PUBLISHED.</b>&nbsp; &#124; <input type=radio value=Y name=publish> Click to publish.\n";
} 

else {  
echo "<select name=publish><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";
}




echo "</td></tr>";


}

?>










<? }
?>