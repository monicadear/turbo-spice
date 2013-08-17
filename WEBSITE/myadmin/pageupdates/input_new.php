<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pagecontent_nav.php"); ?>


<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
<!--
/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/

// whitespace characters
var whitespace = " \t\n\r";

/****************************************************************/
// Check whether string s is empty.
function isEmpty(s)

{ return ((s == null) || (s.length == 0)) }

/****************************************************************/

function isWhitespace (s)
{
var i;

// Is s empty?
if (isEmpty(s)) return true;

// Search through string's characters one by one
// until we find a non-whitespace character.
// When we do, return false; if we don't, return true.

for (i = 0; i < s.length; i++)
{
     // Check that current character isn't whitespace.
     var c = s.charAt(i);

     if (whitespace.indexOf(c) == -1) return false;
}

// All characters are whitespace.
return true;
                                  }
                               /****************************************************************/

function ForceEntry(val, str) {
var strInput = new String(val.value);

if (isWhitespace(strInput)) {
     alert(str);
     return false;
} else
     return true;

                                  }
      /****************************************************************/


 function ValidateData() {

var CanSubmit = false;



// Check to make sure that the form fields are not empty.

CanSubmit = ForceEntry(document.forms[0].titleshow,"Please enter the title for the navigation.");
 // Check to make sure required information exists.
           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title for the page.");
            return CanSubmit;
                     }
--> 
</SCRIPT>



<h1>Admin: Page Content Input New</h1>

<p>
<B>These are the main pages within the site. Enter a new page here.</B></p>




<!-- -------------- -->



<!--  -------------------------    -->
<!--  ------INPUT FORM---------    -->
<!--  -------------------------    -->

<table>
<?php
echo "<FORM method=post action=php_handler.php ONSUBMIT='return ValidateData()';>";
?>

<tr><td width=85><b>category:</b></td><td><select name="category"><option></option>
<? include ("../../codes/adminconfig.php"); ?>
<?
/*Search database for item*/
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="category";
$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

$c=0;
while ($myrow = mysql_fetch_array($sql_result)){ 

                   $categoryid=$myrow["categoryid"];
                   $categoryname=$myrow["categoryname"];

echo "<option value=$categoryid>$categoryname</option>\n";
$c++;
}
mysql_close();
?>
</select>  <a href=../categories/viewall.php target=new>edit category</a></td></tr>

<tr><td><b>category2 (optional, use for second-level dropdowns):</b></td><td><select name="category2"><option></option>
<? include ("../../codes/adminconfig.php"); ?>
<?
/*Search database for item*/
$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase2="category2";
$sql2 = "SELECT * FROM $tablebase2 ORDER BY categoryid ASC"; 
$sql_result2 = mysql_query($sql2, $connection) or die ("Couldn't execute query"); 

$d=0;
while ($myrow2 = mysql_fetch_array($sql_result2)){ 

                   $category2id=$myrow2["categoryid"];
                   $category2name=$myrow2["categoryname"];

echo "<option value=$category2id>$category2name</option>\n";
$d++;
}
?>
</select> <a href=../categories2/viewall.php target=new>edit category2</a></td></tr>




<tr><td><b>subcategory:</b></td><td><select name="subcategory"><option></option>
<?
include("../codes/adminconfig.php");

/*Search database for item*/
$dbsub = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebasesub="subcategory";
$sqlsub = "SELECT * FROM $tablebasesub ORDER BY subcategoryid ASC"; 
$sql_resultsub = mysql_query($sqlsub, $connection) or die ("Couldn't execute query"); 

$e=0;
while ($myrowsub = mysql_fetch_array($sql_resultsub)){ 

                   $subcategoryid=$myrowsub["subcategoryid"];
                   $subcategoryname=$myrowsub["subcategoryname"];

echo "<option value=$subcategoryid>$subcategoryname</option>\n";
$d++;
}
mysql_close();
?>
</select></td></tr>

<tr><td><b>title to show for navigation:</b></td><td><input type ="text" name="titleshow" rows="1" value="<?php echo $titleshow ?>" size="50"></td></tr>
<tr><td><b>title on actual page:</b></td><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="50"></td></tr>


<script type="text/javascript" src="/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

	// Theme options
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,



	
});
</script>







<tr><td valign=top><b>text</b></td><td><span class=smalladmintext>Select the text, then use these buttons to format text:</span>	



<textarea name='text' id='text' rows=20 cols=60><?echo "$text";?></textarea>


		

</td></tr>



<tr><td><b>author:</b></td><td><? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"></td></tr>


<? $showorder=1;?>
<tr><td><b>order:</b></td><td><input type ="text" name="showorder" rows="1" value="<?php echo $showorder ?>" size="20">(from 1-999, specifies navigation order)</td></tr>
<tr><td><b>publish?</b></td><td><input type=radio name=publish value=Y checked> Yes, publish to the live site<BR><input type=radio name=publish value=N> No, keep private for now</td></tr>
<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)
</FORM> </td></tr>
</table>

<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->





<!-- -------------- -->


<? include ("../adminfooter.php"); ?>

<? }
?>