<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 


}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("testimonialcontent_nav.php"); ?>


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
           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].text,"Please enter the text.");
           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].author,"Please enter your name.");
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
<tr><td><b>text:</b></td><td><textarea name="text" rows="4" cols="30"><?php echo $text ?></textarea></td></tr>
<tr><td><b>author:</b></td><td><input type ="text" name="author" rows="1" value="<?php echo $author ?>" size="30"></td></tr>
<tr><td><b>location:</b></td><td><input type ="text" name="location" rows="1" value="<?php echo $location ?>" size="50"></td></tr>
<? $showorder=1;?>
<tr><td><b>order:</b> (list a number from 1-10 to show the order in the navigation)</td><td><input type ="text" name="showorder" rows="1" value="<?php echo $showorder ?>" size="50"></td></tr>
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