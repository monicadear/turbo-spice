<?php
// Easily Simple Calendar
// Version 4.5
// (c) 2001-2004 Brian E. Nash -- Easily Simple Scripts
// http://calendar.esscripts.com

///////////////////////////////////////////
// LICENSING NOTICE ///////////////////////
///////////////////////////////////////////

// Please see the license.txt file for the Terms of Use.
// Visit our web site for the most-current version of the license.

//////////////////////////////
// CALENDAR DISPLAY SETUP ////
//////////////////////////////

// TIME ZONE -- GMT
// Enter the GMT value of your time zone.
// For positive "+" values, simply enter the number. For example, GMT +1 :: $gmt = "1";
// For negative "-" values, you must enter a minus sign before the number. For example, GMT -5 :: $gmt = "-5";
$gmt="-16";

// DATE FORMAT
// Set the format of dates according to the examples below
// $dateFormat=1 :: mm-dd-yyyy
// $dateFormat=2 :: dd-mm-yyyy
$dateFormat=1;

// WIDTH OF CALENDAR TABLE
// *** Make sure the width is set to a multiple of 7.
// *** This will ensure you have evenly spaced columns.
$tableWidth=238;

// CALENDAR CELL SPACING AND PADDING
// Set $cellSpacing to the number of pixels of cell spacing (space between each cell)
// Set $cellPadding to the number of pixels of cell padding (space around names and numbers inside cells)
$cellSpacing=1;
$cellPadding=0;

// FIRST DAY OF THE CALENDAR WEEK
// 0=Sunday; 1=Monday; 2=Tuesday; 3=Wednesday; 4=Thursday; 5=Friday; 6=Saturday
$weekDayStart=0;

// DISPLAY YEAR
// $displayYear=1 :: Will display the year number after the month name.
// By setting $displayYear to any number other than 1, the script will NOT display the year.
$displayYear=1;

// HIGHLIGHT TODAY
// $highlightToday=1 :: Will highlight today's date.
// By setting $highlightToday to any number other than 1, the script will NOT highlight todays date.
$highlightToday=1;

// RESET EVENT DATA
// $resetEvents=1 :: Will reset the event start, event end and event descriptions variables.
// By setting $resetEvents to any number other than 1, the script will NOT reset the variables.
// This is useful if you have multiple calendars on the same page and only use SQL or flat file databases.
$resetEvents=1;

// DISPLAY EMPTY CALENDAR ROWS
// $displayEmptyRows=1 :: Display the sixth row of the calendar even if there are not dates on that row.
// Setting $displayEmptyRows to any number but one (1), the script will NOT display empty calendar rows.
$displayEmptyRows=1;

//////////////////////////////
// mySQL DATABASE SETUP //////
//////////////////////////////

// READ EVENTS DATA FROM mySQL DATABASE
// You can not use mySQL events and $es/$ee command-line variables together. It will procude errors.
// $readSQL=1 :: Read dates and events for marking the calendar from a mySQL database.
// Setting $readSQL to any number but one (1), the script will NOT attempt to read mySQL data.
$readSQL=1;

// SET DATABASE CONNECTION IF USING mySQL DATABASE
// Set the variables below to connect to your mySQL server
$dbHost      = "mysql291.secureserver.net";  // Host Name
$dbUserLogin = "wobotable";  // User Name
$dbPassword  = "trutH12";  // User Password
$dbName      = "wobotable";  // Database Name

//////////////////////////////
// FLAT-FILE DATABASE SETUP //
//////////////////////////////

// READ EVENTS CALENDAR FROM FILE
// You can not use flat-file events and $es/$ee command-line variables together. It will procude errors.
// $readFile=1 :: Read dates and events for marking the calendar from the esdates.txt file.
// That file sould be located in the same directory as this script.
// Setting $readFile to any number but one (1), the script will NOT attempt to read the estates.txt file.
$readFile=0;

//////////////////////////////
// ADMINISTRATION SETUP //////
//////////////////////////////

// SET CALENDAR ADMINISTRATION LINK 
$fileName = "/admin/calendar/calendaradmin.php";

// SET CALENDAR LINK (The name of the actual calendar file)
$calendarLink = "../calendarevents/calendar.php";

// MAXIMUM NUMBER OF DAYS FOR EVENTS
$maxDays = 7;

// MAXIMUM NUMBER OF YEARS FOR EVENTS
$maxYears = 2;

//////////////////////////////
// POP-UP SETUP //////////////
//////////////////////////////

// USE STANDARD POP-UP WINDOW
// The Standard Pop-up window will appear if someone clicks on a date that has an event.
// $standardPop=1 :: For dates with events that have descriptions, show the standard pop-up window.
// Setting $standardPop to any number but one (1), the script will NOT use the standard pop-up window.
$standardPop=1;
$popupWidth=300;  // SET THE WIDTH OF THE EVENT VIEW POPUP WINDOW
$popupHeight=400; // SET THE HEIGHT OF THE EVENT VIEW POPUP WINDOW

// USE overLIB POPUP LIBRARY
// The overLIB Pop-up Library will appear if someone hovers over a date that has an event.
// $overLIB=1 :: User the overLIB javascript functions to show pop-up windows on mouseover.
// Setting $overLIB to any number but one (1), the script will NOT attempt to use the overLIB pop-up features.
// Please see the instructions.htm file about how to set up your pages to use the overLIB script.
$overLIB=1;
$olWidth=300; // Set this to the width of the overLIB pop-up window.

//////////////////////////////
// LANGUAGE SETUP ////////////
//////////////////////////////

// DAY NAMES
// Edit the day name column headers below
$day[0]="S";
$day[1]="M";
$day[2]="T";
$day[3]="W";
$day[4]="T";
$day[5]="F";
$day[6]="S";

// MONTH NAMES
// Edit the month names below
$mth[1]="January";
$mth[2]="February";
$mth[3]="March";
$mth[4]="April";
$mth[5]="May";
$mth[6]="June";
$mth[7]="July";
$mth[8]="August";
$mth[9]="September";
$mth[10]="October";
$mth[11]="November";
$mth[12]="December";
?>