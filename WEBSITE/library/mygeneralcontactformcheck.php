<?
srand(time());
$random = (rand()%9);
$checksum = $random * 2;
?>

<SCRIPT LANGUAGE="JavaScript"><!--
	random = <?echo $random?>;
	checksum = <?echo $checksum?>;
-->

</SCRIPT>


<SCRIPT LANGUAGE="JavaScript"><!--

function IsNumeric(sText)

{
   var ValidChars = "0123456789.-";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }


-->
</script>


<SCRIPT LANGUAGE="JavaScript"><!--

function isValidEmail(str) {

   return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
 
}
-->
</script>


<SCRIPT LANGUAGE="JavaScript"><!--

function isValidLink(str) {

   return (str.indexOf("http") > 2) && (str.indexOf("www") > 0);
 
}
-->
</script>

<SCRIPT LANGUAGE="JavaScript"><!--function noEntry() {if (document.emailform.firstname.value.length<1) {     alert("Please fill in your first name.");		return false; }      else if (document.emailform.lastname.value.length<1) {     alert("Please fill in your last name.");		return false; }
	else if (document.emailform.lastname.value==document.emailform.firstname.value) {
alert("Please fill in your real name.");
		return false; }
      else if (document.emailform.myemail.value.length<1) {     alert("Please fill in your email. We keep your information private.");		return false; }

  else if (!isValidEmail(document.emailform.myemail.value)) 
   { 
      alert('Please enter a valid e-mail address.') 
      emailform.myemail.focus(); 
      return false; 
      } 


      else if (document.emailform.myphone.value.length<1) {     alert("Please fill in your phone number.");		return false; }


  else if (!IsNumeric(document.emailform.myphone.value)) 
   { 
      alert('We cannot accept this phone number. Please enter a phone like this 888-888-1234.') 
      emailform.myphone.focus(); 
      return false; 
      } 




      else if (document.emailform.subjecttext.value.length<1) {     alert("Please fill in the nature of your request.");		return false; }


else { return true; }}// --></SCRIPT>

