<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include ("psccontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>

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

CanSubmit = ForceEntry(document.forms[0].productsubcategoryname,"Please enter the category name.");
 // Check to make sure required information exists.
            return CanSubmit;
                     }
--> 
</SCRIPT>



<h1>Admin: Product Sub Category Input New</h1>


<!-- -------------- -->



<!--  -------------------------    -->
<!--  ------INPUT FORM---------    -->
<!--  -------------------------    -->

<table>
<?php
echo "<FORM method=post action=php_handlerpsc.php ONSUBMIT='return ValidateData()';>";
?>


<tr><td><b>Resource Section</b></td><td>
<select name=productsubcategorysecid>
<option value=>Select main part of the website</option>
<?include("subcategorytypelistings_forselect.php");?></select>
</td></tr>

<tr><td><b>Insert new Category name</b> (e.g. Special Files):</td><td><input type=text name=productsubcategoryname value='<?echo"$productsubcategoryname"?>' size=50></td></tr>

<tr><td><b>Show order</b> (where it shows on the page):</td><td><input type=text name=productsubcategoryshoworder value='<?echo"$productsubcategoryshoworder"?>' size=10> (choose a number from 1 higher to 99 lower)</td></tr>

<tr><td>Published?:</td><td>
<input type="checkbox" value="Y" name="publishedbox" checked onClick="if (this.checked) this.form.publishedbox.value=this.value; else this.form.publishedbox.value='N'"> Check to include item in product navigation.</td></tr>



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