=== Website CMS ===
Contributors: monicadear
Last updated: January 11, 2010
Tags: cms, basic, PHP, mySQL, archive
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This is a website content management system first developed in 2004 to assist with managing content.  It is no longer supported and is here only in archive/educational format. The administration secion allows an administrator to update content. The front-end comes with some standard items such as pages, announcements, staff listings, and images. 

== How to install ==

1) Set up your domain name through your domain name registrar.
2) Set up your hosting = requires PHP
3) Set up your database = requires mySQL
4) Follow instructions in INTERNALNOTES.TXT to make edits to items like configuration files and specific variables.
5) IMPORTANT: In SQL_MasterVersion.sql ---> Open in a text editor, then find and replace ADMINUSERNAME with your desired username. 
Find and replace YOUREMAILGOESHERE@COMPANY.com with your desired e-mail address. 
6) In your phpMyAdmin, insert the SQL from SQL_MasterVersion.sql
7) Upload the contents of the entire website folder to your hosting.
8) Navigate in a new browser to your website, and a basic site will appear.
9) Have the system send you a forgotten password, then login with your desired username and password.
10) In the "administration" section you'll be able to make edits to items like pages, announcements, and more.


== Disclaimers ==
This code is no longer active on many current hosting, and your version of PHP may be incompatible. Use at your own risk.  Credit: Jpmaster77 for the original back-end administration session and username/password login function. http://www.evolt.org/node/60384


