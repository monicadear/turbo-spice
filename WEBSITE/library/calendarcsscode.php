
 <style type="text/css">

#calendarcentral {
	margin-top: 10px;
	border: 1px solid black;
}

.calendarHeader { font-weight: bolder; color: #996600; 
                  background-color: #FFFFFF }
.calendarToday { font-weight: bolder; color: #FFFFFF; background-color: #993399}
.calendar { background-color: #FFFFFF}

/* Main Table Setup Incluidng Date Number Fonts, Size and Color */
.mainTable {
	background-color: #CCCCCC;
	border: 1px solid #003366;
 }

/* Month and Year Row Setup */
.monthYearRow {
    line-height: 15pt;
	background-color: #FFFFFF;
	text-align: center;
	vertical-align: middle;
	}
/* Month and Year Text Setup */
.monthYearText {
	font-family: Geneva, Verdana, Arial, sans-serif;
	font-size: 10px;
	font-weight: Bold;
	color: #252216;
	}

/* Day Names Row Setup */
.dayNamesRow {
    line-height: 9pt;
	background-color: #69c;
	text-align: center;
	vertical-align: middle;
	}
/* Day Name Setup */
.dayNamesText {
    font-family: Geneva, Verdana, Arial, sans-serif; 
	font-size: 7px; 
	font-weight: Bold; 
	color: #433D27;
	}

/* Alignments, Font Face, Size and Color for Date Numbers and Row Height */
.rows {
	font-family: Geneva, Verdana, Arial, sans-serif;
	font-size: 7px;
	color: #433D27;
    line-height: 15pt;
	text-align: center;
	vertical-align: middle;
	}

/* Color of Today's Date */
.today {
	color: #CF0000;
    }
/*

/* OverLIB popup text size */
.oLib {
    font-family: Geneva, Verdana, Arial, sans-serif; 
	font-size: 9px; 
    }
/*

---------------------------------------------------------------------------
The classes below determine how the calendar background markings will look.
---------------------------------------------------------------------------

Remove the "background-image..." lines to remove graphics as table cell background images.

If you do use images, change the "background-color..." to a sililar color to that
of your image. This will help persons with slow connections to see the event markings.

You can optionally remove the "background-color..." lines to only use graphics.

*/

/* Normal Cell Background (date number with no event markings) */
.s2 {
	background-color: #EEEEEE; font-size: 9px;
	}
/* Empty Cell Background (empty cells with no date numbers) */
.s20 {
	background-color: #EBEBEB; font-size: 9px;
	}
/* Mark Start Cell Background (usually a slashed graphic to show availability or solid for events) */
.s21 {
	background-color: #ccc;font-size: 9px;
	}
/* Mark Solid Cell Background (solid marked event date background) */
.s22 {
	background-color: #ccc;font-size: 9px;
	}
/* Mark End Cell Background (usually a slashed graphic to show availability or solid for events) */
.s23 {
	background-color: #ccc;font-size: 9px;
	}
/* Mark End/Start Cell Background (usually a slashed graphic to show availability or solid for events) */
.s24 {
	background-color: #ccc;font-size: 9px;
	}


.dates { font-family:Geneva,Arial,Helvetica,sans-serif;font-size:8px;color:#446B93;}
.events { font-family:Geneva,Arial,Helvetica,sans-serif;font-size:10px;color:#000000;font-weight:bold;}
.style5 { font-size:10px;color:#B9B9B9;}
.eventDate { font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#FFFFFF;} 
.style7 {color:#FFFFFF} 
.style8 {color:#003366} 
.style9 {font-size:10px} 
.style11 {color:#A4A4A4} 
.style12 {color:#CCCCCC} 


#righthand {
		width:380px;
	    	padding: 5px;
//		float:right;
                margin: 2px 2px 2px 2px;
                z-index: 10;
              }
</style>