

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

CanSubmit = ForceEntry(document.forms[0].myname,"Please enter your name.");




 // Check to make sure required information exists.



           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].myemail,"Please enter a valid e-mail address. We keep your information private.");


		 if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].myphone,"Please enter your phone number.");



		 if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].mycity,"Please enter the city for your project.");


		 if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].mystate,"Please enter the state or province for your project.");

		 if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].myphone,"Please enter your phone number.");


		 if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].subject,"Please enter the nature of your request.");

            return CanSubmit;                     }


--> 

</SCRIPT>

