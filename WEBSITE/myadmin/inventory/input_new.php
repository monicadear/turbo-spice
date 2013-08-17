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
<? include("inventorynav.php");?>




<script language="javascript">
<!--//


/* ####################### start of double menu code ####################### */
 
//new Option("text","value")
//this code changes menus
function nullOptions(aMenu){
var tot=aMenu.options.length
for (i=0;i<tot;i++)
{
aMenu.options[i]=null
}
aMenu.options.length=0;
}
 
/* ####################### start of files for main options 
####################### */
 
<?include ("../../codes/adminconfig.php");?>
<?include ("function_MySuperSubjects.php");?>

 
/* ####################### end of files for option 1 
####################### */
 






/* ####################### myTopics ####################### */

<?include ("../../codes/adminconfig.php");?>
<?include ("function_MyTopics.php");?>


 
/* ####################### setUp ####################### */
 
function setUp(){

if (navigator.appName.indexOf("Microsoft")>-1)
{
document.formTripleMenu.menuTopics.options[0].selected=true;
document.formTripleMenu.menuSubjects.options[0].selected=true;
document.formTripleMenu.menuFiles.options[0].selected=true;
 
 
}
}
 
/* ####################### end of setup ####################### */
 
 
 
/* ####################### change Subjects ####################### */
function changeSubjects(){
aMenu=document.formTripleMenu.menuSubjects
aMenu2=document.formTripleMenu.menuFiles
aMenu3=document.formTripleMenu.menuTopics

with (aMenu3){
 
switch (selectedIndex) {
case 0:

nullOptions(aMenu)
nullOptions(aMenu2)
aMenu.options[0]=new Option("Pages appear here","none")
aMenu.options[0].selected=true;
history.go(0)
break;


case 1: 
// OPTION 1
nullOptions(aMenu)
nullOptions(aMenu2)
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
MyTopics1(aMenu) 
break;

case 2: 
// OPTION 2
nullOptions(aMenu)
nullOptions(aMenu2)
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
MyTopics2(aMenu) 
break;

case 3: 
// OPTION 3
nullOptions(aMenu)
nullOptions(aMenu2)
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
MyTopics3(aMenu)
break; 
 
	}
		}
			}
 
/* ####################### end of change Subjects ####################### */
 
 
 
/* ####################### changeFiles ####################### */
 
function changeFiles(){
aMenu=document.formTripleMenu.menuSubjects
aMenu2=document.formTripleMenu.menuFiles
aMenu3=document.formTripleMenu.menuTopics;
 


/* ####################### set of files for option 1 ####################### */
 

if (aMenu3.selectedIndex==1)
{
with (aMenu){
 switch (selectedIndex) {

case 0:
aMenu2.options.length=0;
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
history.go(0)
break;

case 1: 
My1Subject1(aMenu2) 
break;

case 2: 
My1Subject2(aMenu2) 
break;

case 3: 
My1Subject3(aMenu2) 
break; 

case 4:
My1Subject4(aMenu2) 
break;
	}
		}
			}
 
/* ####################### set of files for option 2 ####################### */
if (aMenu3.selectedIndex==2)
{
with (aMenu){
 

switch (selectedIndex) {
case 0:
aMenu2.options.length=0;
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
history.go(0)
break;

case 1: 
My2Subject1(aMenu2) 
break;

case 2: 
My2Subject2(aMenu2) 
break;

case 3: 
My2Subject3(aMenu2) 
break;

case 4: 
My2Subject4(aMenu2) 
break;
	}
		}
			}
 
/* ####################### set of files for option 3 ####################### */
 

if (aMenu3.selectedIndex==3)
{
with (aMenu){
 

switch (selectedIndex) {
case 0:
aMenu2.options.length=0;
aMenu2.options[0]=new Option("Pages appear here","none")
aMenu2.options[0].selected=true;
history.go(0)
break;

case 1: 
My3Subject1(aMenu2) 
break;

case 2: 
My3Subject2(aMenu2) 
break;

case 3: 
My3Subject3(aMenu2) 
break; 

case 4: 
My3Subject4(aMenu2) 
break; 
	}
		}
			}
 
 
 
}
 
 
/* ####################### end of doublemenu code ####################### */
//-->

</script>



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

CanSubmit = ForceEntry(document.forms[0].name,"Please enter the name of the item.");
 // Check to make sure required information exists.
           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title.");
            return CanSubmit;                     }

--> 
</SCRIPT>



<div id=indent>

<h2>INPUT NEW ITEM</h2>

<h1>ADMINISTRATION: Input New Item for LISTINGS</h1>

<p>
<B>Enter a new listing here.</B></p>




<!-- -------------- -->



<!--  -------------------------    -->
<!--  ------INPUT FORM---------    -->
<!--  -------------------------    -->

<!-- ####################### copy code below into body

#### -->
<!-- ####################### copy code below into body

#### -->

<form name="formTripleMenu" id="formTripleMenu" method=post action=php_handler.php ONSUBMIT='return ValidateDate()';>

<table border="1">

<tr align="center">

<td colspan=2 bgcolor=#FFCCFF>

<table border=0 cellspacing=3><tr><td valign=top>

<!-- ####################### start of select containing topics ####################### -->

<select name="menuTopics" id="menuTopics" onchange="changeSubjects()" size="1">
<option value="none">Main supercategories appear here</option>
<? include("../../codes/adminconfig.php"); ?>
<? include("producttypelist_supercategory.php");?>
</select>

</td><td valign=top>

<!-- ####################### start of select contaning subjects ####################### -->
<select name="menuSubjects" id="menuSubjects" onchange="changeFiles()" size="1">
<option value="none">Categories appear here</option>
</select>

</td><td valign=top>

<!-- ####################### start of select containing pages ####################### -->

<select name="menuFiles" id="menuFiles" onchange="go(this)" size="1">
<option value="none">Types appear here</option></select>
</td></tr>

</table> <!-- end of inventory sorting table -->
</td></tr>

<tr><th valign=top><b>Name of this resource:</b></th><td><input type=text name="title" value="<? echo $title ?>">(e.g. <b>Agenda, January 8, 2008</b>) </td></tr>


<tr><th valign=top><b>General Description:</b></th><td><i>Add a description of the listing:</i><BR><textarea name="description" rows="7" cols="30"><?php echo $description ?></textarea></td></tr>

<tr><th><b>stacking order:</b></th><td>
<input type ="text" name="stackorder" value="<?php echo $stackorder ?>" size="10"><i>where this item shows on the display page:<BR>all listings marked "1" show up higher than "100"</i></td></tr>


<tr><td>Published?:</td><td>
<input type="checkbox" value="Y" name="publishedbox" checked onClick="if (this.checked) this.form.publishedbox.value=this.value; else this.form.publishedbox.value='N'"> Check to include item in online listings.</td></tr>

<tr><td colspan=2><input type="submit" name="submit_enter" value="next step"> (press only once)
 </td></tr>


</table>

</form>

</div>


<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
