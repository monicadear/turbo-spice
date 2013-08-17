-- phpMyAdmin SQL Dump
-- version 2.6.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 11, 2009 at 06:54 PM
-- Server version: 4.1.15
-- PHP Version: 4.4.2
-- 
-- Database: `DATABASENAME`
-- 



CREATE TABLE IF NOT EXISTS `allproducts` (
  `productid` int(9) NOT NULL auto_increment,
  `dateupdated` varchar(14) NOT NULL,
  `supercategory` char(3) default NULL,
  `category` varchar(20) NOT NULL,
  `type` int(3) default NULL,
  `name` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(254) NOT NULL default '',
  `filename` text NOT NULL,
  `stackorder` int(5) default '1',
  `publishedbox` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`productid`),
  UNIQUE KEY `ID` (`productid`)
) ENGINE=MyISAM  AUTO_INCREMENT=348 ;


CREATE TABLE IF NOT EXISTS `productcategory` (
  `productcategoryid` tinyint(2) NOT NULL auto_increment,
  `productsupercategoryid` tinyint(4) NOT NULL default '0',
  `productcategoryname` varchar(254) NOT NULL default '',
  `productcategoryshoworder` varchar(2) NOT NULL default '',
  `picture1` varchar(255) NOT NULL default '',
  `publishedbox` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`productcategoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `productcategory`
-- 

INSERT INTO `productcategory` (`productcategoryid`, `productsupercategoryid`, `productcategoryname`, `productcategoryshoworder`, `picture1`, `publishedbox`) VALUES 
(1, 1, 'Board Agendas', '1', '', 'Y'),
(2, 1, 'Board Minutes', '2', '', 'Y'),
(3, 2, 'Community Agendas', '3', '', 'Y'),
(4, 2, 'Community Minutes', '4', '', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `productsubcategory`
-- 

CREATE TABLE IF NOT EXISTS `productsubcategory` (
  `productsubcategoryid` tinyint(2) NOT NULL auto_increment,
  `productsubcategorysecid` tinyint(2) NOT NULL default '0',
  `productsubcategoryname` varchar(254) NOT NULL default '',
  `productsubcategoryshoworder` int(4) NOT NULL,
  `picture1` varchar(255) NOT NULL default '',
  `publishedbox` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`productsubcategoryid`)
) ENGINE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `productsubcategory`
-- 

INSERT INTO `productsubcategory` (`productsubcategoryid`, `productsubcategorysecid`, `productsubcategoryname`, `productsubcategoryshoworder`, `picture1`, `publishedbox`) VALUES 
(1, 1, '2000 Board Agenda', 1, '', 'Y'),

-- --------------------------------------------------------

-- 
-- Table structure for table `productsupercategory`
-- 

CREATE TABLE IF NOT EXISTS `productsupercategory` (
  `productsupercategoryid` tinyint(2) NOT NULL auto_increment,
  `productsupercategoryname` varchar(254) NOT NULL default '',
  `productsupercategoryshoworder` varchar(2) NOT NULL default '',
  `picture1` varchar(255) NOT NULL default '',
  `publishedbox` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`productsupercategoryid`)
) AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `productsupercategory`
-- 

INSERT INTO `productsupercategory` (`productsupercategoryid`, `productsupercategoryname`, `productsupercategoryshoworder`, `picture1`, `publishedbox`) VALUES 
(1, 'Category 1', '1', '', 'Y'),
(2, 'Category 2', '2', '', 'Y');


-- --------------------------------------------------------

-- 
-- Table structure for table `active_guests`
-- 

CREATE TABLE IF NOT EXISTS `active_guests` (
  `ip` varchar(15) NOT NULL default '',
  `timestamp` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ip`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `active_guests`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `active_users`
-- 

CREATE TABLE IF NOT EXISTS `active_users` (
  `username` varchar(30) NOT NULL default '',
  `timestamp` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `active_users`
-- 

INSERT INTO `active_users` VALUES ('admin', 1231721131);

-- --------------------------------------------------------

-- 
-- Table structure for table `allphotos`
-- 



CREATE TABLE IF NOT EXISTS `allphotosextended` (
  `pid` int(4) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `category` varchar(2) default NULL,
  `subcategory` varchar(2) default NULL,
  `title` varchar(254) NOT NULL default '',
  `description` text NOT NULL,
  `author` varchar(254) NOT NULL default '',
  `thumbnail` varchar(254) NOT NULL default '',
  `picture1` varchar(254) NOT NULL default '',
  `picture1description` varchar(254) NOT NULL default '',
  `picture2` varchar(254) NOT NULL default '',
  `picture2description` varchar(254) NOT NULL default '',
  `picture3` varchar(254) NOT NULL default '',
  `picture3description` varchar(254) NOT NULL default '',
  `picture4` varchar(254) NOT NULL default '',
  `picture4description` varchar(254) NOT NULL default '',
  `picture5` varchar(254) NOT NULL default '',
  `picture5description` varchar(254) NOT NULL default '',
  `picture6` varchar(254) NOT NULL default '',
  `picture6description` varchar(254) NOT NULL default '',
  `picture7` varchar(254) NOT NULL default '',
  `picture7description` varchar(254) NOT NULL default '',
  `picture8` varchar(254) NOT NULL default '',
  `picture8description` varchar(254) NOT NULL default '',
  `showorder` int(5) default '1',
  UNIQUE KEY `ID` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `allphotos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `announcements`
-- 

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` varchar(14) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `url` varchar(254) NOT NULL default '',
  `aut_id` int(10) unsigned NOT NULL default '0',
  `author` varchar(255) NOT NULL default '',
  `picture1` varchar(255) NOT NULL,
  `publish` enum('Y','N') NOT NULL default 'Y',
  `evt_type` tinyint(2) NOT NULL default '0',
  `tags` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `announcements`
-- 

INSERT INTO `announcements` VALUES (100, '20081221221906', 'Volunteer Opportunities', 'Would you like to volunteer with us? We are seeking the following:&lt;BR&gt;\nWebmaster&lt;BR&gt;\nGraphic Designer&lt;BR&gt;\nData Entry&lt;BR&gt;\nProgram Development&lt;BR&gt;&lt;BR&gt;\nIf you&#039;d like to join us, please contact us.&lt;BR&gt;&lt;BR&gt;\n&lt;BR&gt;\n', '', 0, 'webmaster', '','Y', 0, 'job listings');

-- --------------------------------------------------------

-- 
-- Table structure for table `banned_users`
-- 

CREATE TABLE IF NOT EXISTS `banned_users` (
  `username` varchar(30) NOT NULL default '',
  `timestamp` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `banned_users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `calendar`
-- 

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `category` varchar(250) NOT NULL default '',
  `subcategory` varchar(250) NOT NULL default '',
  `startdate` date NOT NULL default '0000-00-00',
  `enddate` date NOT NULL default '0000-00-00',
  `title` varchar(254) NOT NULL default '',
  `description` text NOT NULL,
  `starttime` varchar(100) NOT NULL default '',
  `endtime` varchar(100) NOT NULL default '',
  `location` varchar(255) NOT NULL default '',
  `price` varchar(254) NOT NULL default '',
  `pricenonmembers` varchar(254) NOT NULL default '',
  `contact` varchar(150) NOT NULL default '',
  `website` varchar(255) NOT NULL default '',
  `aut_id` int(10) unsigned NOT NULL default '1',
  `publish` enum('Y','N') NOT NULL default 'Y',
  `evt_type` int(10) unsigned NOT NULL default '1',
  `datecreated` varchar(14) NOT NULL default '0000-00-00 00:',
  `dateupdated` varchar(14) NOT NULL default '0000-00-00 00:',
  `tags` varchar(255) NOT NULL default '',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 ;

-- 
-- Dumping data for table `calendar`
-- 

INSERT INTO `calendar` VALUES (63, '1', '1', '2008-11-15', '2008-11-15', 'Revised Website Launch!', '                Check out our new website! Please give us suggestions, corrections, and your feedback. Thank you!', '', '', '', '', '', '', '', 0, 'Y', 0, '20080811041236', '20081210070500', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` tinyint(2) NOT NULL auto_increment,
  `categoryname` varchar(254) NOT NULL default '',
  `showorder` tinyint(3) NOT NULL,
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (1, 'Category 1','1');
INSERT INTO `category` VALUES (2, 'Category 2','2');
INSERT INTO `category` VALUES (3, 'Category 3','3');
INSERT INTO `category` VALUES (4, 'Category 4','4');
INSERT INTO `category` VALUES (5, 'Category 5','5');
INSERT INTO `category` VALUES (6, 'Category 6','6');
INSERT INTO `category` VALUES (7, 'Category 7','7');
INSERT INTO `category` VALUES (8, 'Category 8','8');
INSERT INTO `category` VALUES (9, 'Staff-only Pages','9');
INSERT INTO `category` VALUES (10, 'Staff-only Announcements','10');
INSERT INTO `category` VALUES (11, 'Staff-only Events','11');
INSERT INTO `category` VALUES (12, 'Staff-only Files','12');

-- --------------------------------------------------------

CREATE TABLE  `category2` (
  `categoryid` tinyint(2) NOT NULL auto_increment,
  `categoryname` varchar(254) NOT NULL default '',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `category2`
-- 



-- 
-- Table structure for table `directory`
-- 

CREATE TABLE IF NOT EXISTS `directory` (
  `id` int(6) auto_increment,
  `dateupdated` varchar(14) NOT NULL default '',
  `firstname` varchar(80) NOT NULL default '',
  `lastname` varchar(80) NOT NULL default '',
  `company` varchar(200) NOT NULL default '',
  `address` varchar(254) NOT NULL default '',
  `city` varchar(50) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `zip` varchar(25) NOT NULL default '',
  `company_phone_number` varchar(20) NOT NULL default '',
  `company_fax_number` varchar(20) NOT NULL default '',
  `myhomeaddress` varchar(254) NOT NULL default '',
  `myhomecity` varchar(254) NOT NULL default '',
  `myhomestate` varchar(5) NOT NULL default '',
  `myhomezip` varchar(12) NOT NULL default '',
  `myhomephone_number` varchar(20) NOT NULL default '',
  `myhomefax_number` varchar(20) NOT NULL default '',
  `email` varchar(150) NOT NULL default '',
  `website` varchar(190) NOT NULL default '',
  `preference` enum('Company','Home') NOT NULL default 'Company',
  `localchapter` varchar(15) NOT NULL default '',
  `membersince` varchar(70) NOT NULL default '',
  `lastpaiddate` varchar(70) NOT NULL default '',
  `validuntil` varchar(70) NOT NULL default '',
  `publish` char(1) NOT NULL default 'Y',
  `datecreated` varchar(14) NOT NULL default '',
  `description` text NOT NULL,
  `picture1` varchar(254) NOT NULL default '',
  `typeofcontact` varchar(254) NOT NULL default 'Member',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `directory`
-- 



-- --------------------------------------------------------

-- 
-- Table structure for table `documentcategory`
-- 

CREATE TABLE IF NOT EXISTS `documentcategory` (
  `categoryid` tinyint(5) NOT NULL auto_increment,
  `categoryname` varchar(250) NOT NULL default '',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `documentcategory`
-- 

INSERT INTO `documentcategory` VALUES (1, 'General Files');
INSERT INTO `documentcategory` VALUES (2, 'Staff Files');
INSERT INTO `documentcategory` VALUES (3, 'Conference and Training Materials');
INSERT INTO `documentcategory` VALUES (4, 'Templates');
INSERT INTO `documentcategory` VALUES (5, 'Publications');
INSERT INTO `documentcategory` VALUES (6, 'Resource');

-- --------------------------------------------------------

-- 
-- Table structure for table `documentsubcategory`
-- 

CREATE TABLE IF NOT EXISTS `documentsubcategory` (
  `subcategoryid` tinyint(5) NOT NULL auto_increment,
  `subcategoryname` varchar(250) NOT NULL default '',
  KEY `subcategoryid` (`subcategoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `documentsubcategory`
-- 

INSERT INTO `documentsubcategory` VALUES (1, 'General Files');
INSERT INTO `documentsubcategory` VALUES (2, 'Meeting Minutes');
INSERT INTO `documentsubcategory` VALUES (3, 'Website Link');
INSERT INTO `documentsubcategory` VALUES (4, 'Internal Document');
INSERT INTO `documentsubcategory` VALUES (5, 'Picture Image or Logo');
INSERT INTO `documentsubcategory` VALUES (6, 'Regular Document');

-- --------------------------------------------------------

-- 
-- Table structure for table `downloads`
-- 

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` varchar(2) NOT NULL default '',
  `subcategory` varchar(2) NOT NULL default '',
  `title` text NOT NULL,
  `text` text NOT NULL,
  `filename` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `aut_id` int(10) unsigned NOT NULL default '0',
  `datecreated` varchar(14) NOT NULL default '',
  `dateupdated` varchar(14) NOT NULL default '',
  `publish` enum('Y','N') NOT NULL default 'Y',
  `evt_type` int(10) NOT NULL default '0',
  `tags` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=500 ;

-- 
-- Dumping data for table `downloads`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `faqcategory`
-- 

CREATE TABLE IF NOT EXISTS `faqcategory` (
  `categoryid` tinyint(3) NOT NULL auto_increment,
  `categoryname` varchar(200) NOT NULL default '',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `faqcategory`
-- 

INSERT INTO `faqcategory` VALUES (1, 'General Questions');

-- --------------------------------------------------------

-- 
-- Table structure for table `faqs`
-- 

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(5) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `category` int(3) default NULL,
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `filename` varchar(254) NOT NULL default '',
  `weblink` varchar(254) NOT NULL default '',
  `author` varchar(40) NOT NULL default '',
  `showorder` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `faqs`
-- 

INSERT INTO `faqs` VALUES (1, '20081221192721', 1, 'What types of services do you offer?', 'We offer a variety of services to our customers and clients. Please review our services pagefor an updated list.', '', '', 'Webmaster', 1);


-- --------------------------------------------------------

-- 
-- Table structure for table `jobs`
-- 

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(6) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `title` varchar(200) NOT NULL default '',
  `description` text NOT NULL,
  `department` varchar(150) NOT NULL default '',
  `reportsto` varchar(150) NOT NULL default '',
  `status` varchar(150) NOT NULL default '',
  `hours` varchar(150) NOT NULL default '',
  `wage` varchar(200) NOT NULL default '',
  `location` varchar(200) NOT NULL default '',
  `phone` varchar(200) NOT NULL default '',
  `email` varchar(254) NOT NULL default '',
  `aut_id` varchar(20) NOT NULL default '',
  `author` varchar(150) NOT NULL default '',
  `publish` enum('Y','N') default NULL,
  `evt_type` tinyint(1) NOT NULL default '0',
  `tags` varchar(254) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `jobs`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `linkcategory`
-- 

CREATE TABLE IF NOT EXISTS `linkcategory` (
  `categoryid` int(4) NOT NULL auto_increment,
  `categoryname` varchar(50) NOT NULL default '',
  `showorder` int(4) NOT NULL,
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `linkcategory`
-- 

INSERT INTO `linkcategory` VALUES (1, 'Links','1');

-- --------------------------------------------------------

-- 
-- Table structure for table `membertype`
-- 

CREATE TABLE IF NOT EXISTS `membertype` (
  `categoryid` tinyint(3) NOT NULL auto_increment,
  `categoryname` varchar(254) NOT NULL default '',
  `categorytitle` varchar(255) NOT NULL default '',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `membertype`
-- 

INSERT INTO `membertype` VALUES (1, 'professional', 'Professional');
INSERT INTO `membertype` VALUES (2, 'student', 'Student');

-- --------------------------------------------------------

-- 
-- Table structure for table `newsletters`
-- 

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(4) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `filename` text NOT NULL,
  `thumbnail` text NOT NULL,
  `author` varchar(255) NOT NULL default '',
  `showorder` int(3) NOT NULL,
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 ;

-- 
-- Dumping data for table `newsletters`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pagecontent`
-- 

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `id` int(4) NOT NULL auto_increment,
  `datecreated` varchar(14) default NULL,
  `dateedited` varchar(14) default NULL,
  `category` int(3) default NULL,
  `category2` int(3) default NULL,
  `subcategory` int(3) default NULL,
  `titleshow` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `author` varchar(254) NOT NULL default '',
  `editedby` varchar(254) NOT NULL default '',
  `picture1` varchar(254) NOT NULL default '',
  `picture2` varchar(254) NOT NULL default '',
  `showorder` int(5) NOT NULL default '0',
  `publish` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 ;

-- 
-- Dumping data for table `pagecontent`
-- 

INSERT INTO `pagecontent` VALUES(1, '20081212120000','20081212120000', 1, '', 9, 'Home', 'Welcome to the homepage', '', 'webmaster','webmaster', '', '', 1, 'Y');
INSERT INTO `pagecontent` VALUES(2, '20081212120000','20081212120000',  1, '', 4, 'Privacy', 'Privacy', '            We take your privacy seriously and we do not sell, rent, or share your information.&lt;BR&gt;&lt;BR&gt;\nApplications are sent directly to our membership coordinator.', 'webmaster','webmaster', '', '', 150, 'Y');
INSERT INTO `pagecontent` VALUES(3, '20081212120000','20081212120000', 1, '', 9, 'Thank You', 'Thank You', '                Thank you for your support. If you have made an online payment, you will receive an e-mailed receipt.', 'webmaster','webmaster', '', '', 160, 'Y');
INSERT INTO `pagecontent` VALUES(4, '20081212120000','20081212120000', 7, '', 4, 'Terms and Conditions of Use', 'Terms and Conditions of Use', '            PLEASE READ THESE TERMS AND CONDITIONS OF USE CAREFULLY BEFORE USING THIS SITE.&lt;BR&gt;&lt;BR&gt;\nBy using this Web site, you signify your agreement to these terms of use. If you do not agree to these terms of use, please do not use this Web site. We reserve the right, at our discretion, to change, modify, add, or remove portions of these terms at any time. Please check these terms periodically for changes. Your continued use of this Web site following the posting of changes to these terms constitutes your acceptance of those changes.&lt;BR&gt;&lt;BR&gt;\nCopyright Notice&lt;BR&gt;\nCopyright by &lt;b&gt;ORGANIZATION&lt;/b&gt;. All Rights Reserved. &lt;BR&gt;&lt;BR&gt;\n&lt;BR&gt;\nSome materials delivered from this Web site may contain other proprietary notices and copyright information relating to those materials. All photographs, information, materials and other content contained on this Web site are owned by &lt;b&gt;ORGANIZATION&lt;/b&gt; and/or its contributors. This Web site contains original works of authorship that are the proprietary property of &lt;b&gt;ORGANIZATION&lt;/b&gt; and/or its contributors, and which are protected under U.S. and international copyright laws. It is prohibited to copy, reproduce, modify, display, republish, upload, post, transmit, distribute, alter, prepare any derivative works of, or otherwise use any material from this Web site, including without limitation code, software, photographs and images, without the prior express written consent of &lt;b&gt;ORGANIZATION&lt;/b&gt;. &lt;BR&gt;&lt;BR&gt;\nOther Restrictions on Use&lt;BR&gt;\nPermission to download one copy of the materials delivered from this Web site on any single computer for personal, home use only is hereby granted under the following conditions: The above copyright notice and this permission notice must appear in all copies; Any use of the materials available from this Web site must be for informational or educational purposes only and in no instance for commercial purposes; No materials available from this Web site can be modified in any way, and no graphics available from this Web site can be downloaded or used separate from the accompanying text;&lt;BR&gt;&lt;BR&gt;\nNo materials may be downloaded to a database that can be used to avoid future downloads from the Web site. Any unauthorized use of the materials contained on this Web site may violate copyright laws, trademark laws, communications regulations and statutes, and the laws of privacy. Nothing contained herein shall be construed as conferring by implication, estoppel, or otherwise any license or right under any trademark, copyright, or other intellectual property right of &lt;b&gt;ORGANIZATION&lt;/b&gt;. &lt;b&gt;ORGANIZATION&lt;/b&gt; neither warrants nor represents that the use of materials contained on this Web site will not infringe the rights of third parties. Except as expressly granted above, all rights are expressly reserved to &lt;b&gt;ORGANIZATION&lt;/b&gt;.&lt;BR&gt;&lt;BR&gt;\nLinks&lt;BR&gt;\nAs a general practice, &lt;b&gt;ORGANIZATION&lt;/b&gt; does not object to links made to Web sites owned or operated by the &lt;b&gt;ORGANIZATION&lt;/b&gt; from other sites. There are certain terms and conditions that should be followed. A link to the &lt;b&gt;ORGANIZATION&lt;/b&gt; Web site is permissible using the plain text name of &lt;b&gt;ORGANIZATION&lt;/b&gt;, or any sized reproduction of the posted logo.&lt;BR&gt;&lt;BR&gt;\nDue to frequent content updates, &lt;b&gt;ORGANIZATION&lt;/b&gt; recommends that the link be only to the home page of this website. Without &lt;b&gt;ORGANIZATION&lt;/b&gt;&#039;s express written permission for a particular use, no content from this Web site should be incorporated into the party&#039;s site, e.g., by in-lining or framing. In addition, none of the &lt;b&gt;ORGANIZATION&lt;/b&gt; logos, designs, images, photographs, slogans, product trademark or service marks, or any other words or codes identifying the web site should be used in any META tag or other information used by search engines or other information location tools to identify and select sites. Any questions, requests, or comments should be addressed to the contact information above. &lt;BR&gt;&lt;BR&gt;\nInformation Warranty Disclaimer&lt;BR&gt;\nAll materials and related graphics provided by this web site and any other materials which are referenced by or linked to this web site are provided &quot;as is&quot; without warranty of any kind, either express or implied. To the maximum extent permitted by law, the organization hereby disclaims all warranties and conditions with regard to any materials provided by this web site or any other materials which are referenced by or linked to this web site, including but not limited to all implied warranties and conditions of merchantability, fitness for a particular purpose and non-infringement.&lt;BR&gt;&lt;BR&gt;\n&lt;b&gt;ORGANIZATION&lt;/b&gt; makes no representations about the suitability of the information delivered from this Web site or any other materials that are referenced by or linked to this Web site for any purpose. &lt;b&gt;ORGANIZATION&lt;/b&gt; does not warrant the accuracy, quality, reliability, content, or legality of any materials provided by this web site or any other materials which are referenced by or linked to this web site. &lt;b&gt;ORGANIZATION&lt;/b&gt; assumes no responsibility for errors or omissions in the materials provided by this Web site or any other materials which are referenced by or linked to this Web site.&lt;BR&gt;&lt;BR&gt;\n&lt;b&gt;ORGANIZATION&lt;/b&gt; does not warrant that the functional aspects of this Web site will be error free or uninterrupted, that defects will be corrected, or that this Web site or the server that makes it available are free of viruses or other harmful components.&lt;BR&gt;&lt;BR&gt;\nSome jurisdictions may not permit the exclusion of certain warranties or certain limitations of liability; therefore, some of the above exclusions and limitations may not apply. In those jurisdictions, the liability of &lt;b&gt;ORGANIZATION&lt;/b&gt; shall be limited to the maximum extent allowed by law.&lt;BR&gt;&lt;BR&gt;\n&lt;b&gt;ORGANIZATION&lt;/b&gt; may update or make changes to the materials provided by this Web site at any time without notice; however, &lt;b&gt;ORGANIZATION&lt;/b&gt; makes no commitment to update the information contained herein.&lt;BR&gt;&lt;BR&gt;\nLimitation of Liability&lt;BR&gt;\nIn no event, including but not limited to negligence, shall &lt;b&gt;ORGANIZATION&lt;/b&gt; be liable under any theory of tort, contract, strict liability, or other legal or equitable theory for any special, indirect, incidental, consequential, exemplary, or punitive damages, or for damages of any kind arising out of or in connection with the use or performance of information contained in any materials provided by this web site or in any other materials which are referenced by or linked to this web site, even if &lt;b&gt;ORGANIZATION&lt;/b&gt; or an authorized representative of &lt;b&gt;ORGANIZATION&lt;/b&gt; has advised the user of the possibility of damages. In no event shall &lt;b&gt;ORGANIZATION&lt;/b&gt; cumulative liability to any party for any damages, losses, or causes of action, whether in contract, tort, or otherwise, arising out of or related to this web site or to these terms, exceed the amount paid, if any, for accessing this web site.&lt;BR&gt;&lt;BR&gt;\nContent Posted by Third Parties&lt;BR&gt;\nAny party who posts information to this Web site agrees not to post any material which is bigoted, hateful, racially offensive, libelous, defamatory, obscene, pornographic, threatening, abusive, illegal, a violation of any copyright or trademark rights, invasive of privacy rights, or a violation of the rights of any party, and further agrees not to represent himself or herself as someone else. &lt;b&gt;ORGANIZATION&lt;/b&gt; does not permit any commercial postings, advertising or soliciting, posting of viruses, or off theme postings.&lt;BR&gt;&lt;BR&gt;\n&lt;b&gt;ORGANIZATION&lt;/b&gt; reserves the right to modify, reject, or eliminate any information residing on or transmitted to this Web site that, in its sole discretion, it believes is unacceptable or in violation of these terms and conditions. Any party who posts information to this Web site remains solely responsible for the content of their postings.&lt;BR&gt;&lt;BR&gt;\nThe use, distribution, or publication of any materials posted by third parties does not constitute or imply an endorsement of those materials or of any opinions or comments in those materials. &lt;b&gt;ORGANIZATION&lt;/b&gt; disclaims all responsibility for any bigoted, hateful, racially offensive, libelous, defamatory, obscene, pornographic, threatening, abusive, illegal, or copyright or trademark infringing material, or material that is invasive of privacy rights or a violation of the rights of any party, posted to this Web site by any third party.&lt;BR&gt;&lt;BR&gt;\n', 'webmaster','webmaster', '', '', 151, 'Y');
INSERT INTO `pagecontent` VALUES(5, '20081212120000','20081212120000', 2, '', 5, 'Our Board', 'Our Board', 'A list of our board and staff follows.', 'webmaster','webmaster', '', '', 25, 'Y');
INSERT INTO `pagecontent` VALUES(6, '20081212120000','20081212120000', 10, '', 3, 'Announcements', 'Announcements', '                                This is a list of all the current announcements.', 'webmaster','webmaster', '', '', 135, 'Y');
INSERT INTO `pagecontent` VALUES(7, '20081212120000','20081212120000', 11, '', 7, 'Add a Calendar Event', 'Add a Calendar Event', '                    Add an event to our calendar', 'webmaster','webmaster', '', '', 142, 'Y');
INSERT INTO `pagecontent` VALUES(8, '20081212120000','20081212120000', 12, '', 7, 'Add an Internal File', 'Add an Internal File', '                    Upload a file to the site', 'webmaster','webmaster', '', '', 143, 'Y');
INSERT INTO `pagecontent` VALUES(9, '20081212120000','20081212120000', 10, '', 7, 'Add an Internal Announcement', 'Add an Internal Announcement', '                Add an Announcement to the Board Announcements', 'webmaster','webmaster', '', '', 141, 'Y');
INSERT INTO `pagecontent` VALUES(10, '20081212120000','20081212120000', 12, '', 3, 'Internal Files', 'Internal Files', '            Internal Files are listed here', 'webmaster','webmaster', '', '', 137, 'Y');
INSERT INTO `pagecontent` VALUES(11, '20081212120000','20081212120000', 11, '', 3, 'Internal Calendar of Events', 'Internal Calendar of Events', '                Calendar of Board-Specific events', 'webmaster','webmaster', '', '', 136, 'Y');
INSERT INTO `pagecontent` VALUES(12, '20081212120000','20081212120000', 2, '', 5, 'Mission Statement', 'Mission Statement', '    ', 'webmaster','webmaster', '', '', 11, 'Y');
INSERT INTO `pagecontent` VALUES(18, '20081212120000','20081212120000', 2, '', 5, 'Committees', 'Committees', 'Committee List', 'webmaster','webmaster', '', '', 13, 'Y');
INSERT INTO `pagecontent` VALUES(19, '20081212120000','20081212120000', 3, '', 1, 'Members', 'Members', 'Members come from all throughout our industry. We invite you to join us.', 'webmaster','webmaster', '', '', 20, 'Y');
INSERT INTO `pagecontent` VALUES(20, '20081212120000','20081212120000', 3, '', 5, 'Benefits of Membership', 'Benefits of Membership', '    Benefits of Membership information coming soon.', 'webmaster','webmaster', '', '', 21, 'Y');
INSERT INTO `pagecontent` VALUES(21, '20081212120000','20081212120000', 3, '', 5, 'Membership List', 'Membership List', 'Please review our current list of members.', 'webmaster','webmaster', '', '', 22, 'Y');
INSERT INTO `pagecontent` VALUES(22, '20081212120000','20081212120000', 3, '', 5, 'Join/Update', 'Join/Update', '        Join us using our online membership application: &lt;a href=/pages/application.php&gt;Online Application&lt;/a&gt; or our print version: &lt;a href=/downloads/membershipapplication.pdf&gt;Membership Application, PDF&lt;/a&gt;.&lt;BR&gt;&lt;BR&gt;\nIf you are already a member, you have the ability to log in to see your details. Please log in with the password you were assigned. If you have not yet been assigned a password, please contact the &lt;a href=/pages/contactus.php?aid=1&gt;Membership Coordinator&lt;/a&gt;.', 'webmaster','webmaster', '', '', 23, 'Y');
INSERT INTO `pagecontent` VALUES(23, '20081212120000','20081212120000', 4, '', 1, 'Information', 'Information', '', 'webmaster','webmaster', '', '', 30, 'Y');
INSERT INTO `pagecontent` VALUES(24, '20081212120000','20081212120000', 4, '', 5, 'Details', 'Details', '', 'webmaster','webmaster', '', '', 31, 'Y');
INSERT INTO `pagecontent` VALUES(25, '20081212120000','20081212120000', 4, '', 5, 'Selected Articles', 'Selected Articles', '', 'webmaster','webmaster', '', '', 32, 'Y');
INSERT INTO `pagecontent` VALUES(26, '20081212120000','20081212120000', 4, '', 5, 'Additional Codes', 'Additional Codes', 'Coming Soon!', 'webmaster','webmaster', '', '', 33, 'Y');
INSERT INTO `pagecontent` VALUES(27, '20081212120000','20081212120000', 4, '', 5, 'Additional Items', 'Additional Items', '', 'webmaster','webmaster', '', '', 34, 'Y');
INSERT INTO `pagecontent` VALUES(28, '20081212120000','20081212120000', 4, '', 5, 'Photo Gallery', 'Photo Gallery', '', 'webmaster','webmaster', '', '', 35, 'Y');
INSERT INTO `pagecontent` VALUES(29, '20081212120000','20081212120000', 4, '', 5, 'Media', 'Media', 'Coming Soon!', 'webmaster','webmaster', '', '', 36, 'Y');
INSERT INTO `pagecontent` VALUES(30, '20081212120000','20081212120000', 4, '', 5, 'FAQs', 'FAQs', '    Frequently-asked questions are answered here. Do you have a question? Please feel free to submit it using our contact form.&lt;BR&gt;&lt;BR&gt;\n&lt;hr&gt;&lt;BR&gt;&lt;BR&gt;\n', 'webmaster','webmaster', '', '', 37, 'Y');
INSERT INTO `pagecontent` VALUES(31, '20081212120000','20081212120000', 5, '', 1, 'Resources', 'Resources', '', 'webmaster','webmaster', '', '', 40, 'Y');

INSERT INTO `pagecontent` VALUES(13, '20081212120000','20081212120000', 5, '', 2, 'Current Events', 'Current Events', '    ', 'webmaster','webmaster', '', '', 60, 'Y');
INSERT INTO `pagecontent` VALUES(43, '20081212120000','20081212120000', 7, '', 6, 'Announcements', 'Announcements', '    What&#039;s new? Bookmark this page for new announcements from us.', 'webmaster','webmaster', '', '', 1, 'Y');
INSERT INTO `pagecontent` VALUES(32, '20081212120000','20081212120000', 5, '', 5, 'Connections', 'Forum/Group/Listserv', 'We run an internal group for members with access to additional information and connections.  Please contact us if you would like to be invited.&lt;BR&gt;\n', 'webmaster','webmaster', '', '', 41, 'Y');
INSERT INTO `pagecontent` VALUES(14, '20081212120000','20081212120000', 7, '', 2, 'Contact Us', 'Contact us', '    Please feel free to contact us through our &lt;a href=/pages/contactus.php?aid=1&gt;e-mail contact form&lt;/a&gt;.&lt;BR&gt;&lt;BR&gt;\n&lt;BR&gt;\n', 'webmaster','webmaster', '', '', 120, 'Y');
INSERT INTO `pagecontent` VALUES(44, '20081212120000','20081212120000', 13, '', 4, 'Site Credits', 'Site Credits', '    Web design and installation: webmaster', 'webmaster','webmaster', '', '', 999, 'Y');
INSERT INTO `pagecontent` VALUES(15, '20081212120000','20081212120000', 2, '', 5, 'Our History', 'Our History', ' ', 'webmaster','webmaster', '', '', 14, 'Y');
INSERT INTO `pagecontent` VALUES(16, '20081212120000','20081212120000', 2, '', 5, 'Advisory Board', 'Advisory Board', ' ', 'webmaster','webmaster', '', '', 12, 'Y');
INSERT INTO `pagecontent` VALUES(17, '20081212120000','20081212120000', 2, '', 1, 'About Us', 'About Us', '  ', 'webmaster','webmaster', '', '', 10, 'Y');
INSERT INTO `pagecontent` VALUES(33, '20081212120000','20081212120000', 4, '', 5, 'Newsletters', 'Newsletters', '    Coming Soon!', 'webmaster','webmaster', '', '', 42, 'Y');
INSERT INTO `pagecontent` VALUES(35, '20081212120000','20081212120000', 5, '', 5, 'Find a Professional', 'Find a Professional', '', 'webmaster','webmaster', '', '', 44, 'Y');
INSERT INTO `pagecontent` VALUES(36, '20081212120000','20081212120000', 5, '', 5, 'Speakers', 'Speakers', 'Coming Soon!', 'webmaster','webmaster', '', '', 45, 'Y');
INSERT INTO `pagecontent` VALUES(39, '20081212120000','20081212120000', 6, '', 1, 'Links', 'Links', 'Links that we&#039;ve collected for your review', 'webmaster','webmaster', '', '', 50, 'Y');
INSERT INTO `pagecontent` VALUES(40, '20081212120000','20081212120000', 6, '', 2, 'Store', 'Store', 'Visit our online store', 'webmaster','webmaster', '', '', 70, 'Y');
INSERT INTO `pagecontent` VALUES(41, '20081212120000','20081212120000', 7, '', 2, 'Join Us', 'Join us', 'We invite you to join us as a member.&lt;BR&gt;&lt;BR&gt;\n&lt;a href=/pages/application.php&gt;ONLINE APPLICATION&lt;/a&gt;&lt;BR&gt;&lt;BR&gt;\nAnnual dues are $50 suggested.&lt;BR&gt;&lt;BR&gt;\nPlease use our online application form, or print out and send an application to us. ', 'webmaster','webmaster', '', '', 80, 'Y');
INSERT INTO `pagecontent` VALUES(45, '20081212120000','20081212120000', 13, '', 1, 'Homepage Slideshow Captions', 'Homepage Slideshow Captions', '    Caption[1]  = &quot;Welcome to our organization!&quot;;&lt;BR&gt;\nCaption[2]  = &quot;&quot;;&lt;BR&gt;\nCaption[3]  = &quot;&quot;;&lt;BR&gt;\nCaption[4]  = &quot;&quot;;&lt;BR&gt;\nCaption[5]  = &quot;&quot;;&lt;BR&gt;\nCaption[6]  = &quot;&quot;;&lt;BR&gt;\nCaption[7]  = &quot;&quot;;&lt;BR&gt;\nCaption[8]  = &quot;&quot;;', 'webmaster','webmaster', '', '', 1, 'N');
INSERT INTO `pagecontent` VALUES(50, '20081212120000','20081212120000', 6, '', 1, 'Donate', 'Donate', 'Make a Donation', 'webmaster','webmaster', '', '', 80, 'Y');
INSERT INTO `pagecontent` VALUES(51, '20081212120000','20081212120000', 6, '', 1, 'Contact Address', 'Contact Address', 'Edit your information', 'webmaster','webmaster', '', '', 80, 'Y');
INSERT INTO `pagecontent` VALUES(52, '20081212120000','20081212120000', 6, '', 1, 'In the News', 'In the News', 'News articles', 'webmaster','webmaster', '', '', 80, 'Y');
INSERT INTO `pagecontent` VALUES(53, '20081212120000','20081212120000', 6, '', 1, 'Press Releases', 'Press Releases', 'Recent press releases', 'webmaster','webmaster', '', '', 80, 'Y');


-- --------------------------------------------------------

-- 
-- Table structure for table `pressreleases`
-- 

CREATE TABLE IF NOT EXISTS `pressreleases` (
  `id` int(4) NOT NULL auto_increment,
  `datecreated` varchar(14) default NULL,
  `dateofrelease` varchar(14) default NULL,
  `category` int(5) default NULL,
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `filename` varchar(254) NOT NULL default '',
  `webslink` varchar(254) NOT NULL default '',
  `author` varchar(254) NOT NULL default '',
  `showorder` int(7) NOT NULL default '0',
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `pressreleases`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `productsmall`
-- 

CREATE TABLE IF NOT EXISTS `productsmall` (
  `id` int(10) NOT NULL auto_increment,
  `date` varchar(14) NOT NULL default '',
  `title` varchar(254) NOT NULL default '',
  `title2` varchar(254) NOT NULL default '',
  `creator` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `moreinfo` text NOT NULL,
  `price` varchar(12) NOT NULL default '',
  `filename` varchar(254) NOT NULL default '',
  `filename2` varchar(254) NOT NULL default '',
  `webslink` varchar(254) NOT NULL default '',
  `author` varchar(254) NOT NULL default '',
  `showorder` int(5) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `productsmall`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `resources`
-- 

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(4) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `category` varchar(2) default NULL,
  `subcategory` varchar(2) default NULL,
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `author` varchar(254) NOT NULL default '',
  `picture1` varchar(255) NOT NULL default '',
  `weblink` text NOT NULL,
  `showorder` int(5) default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `resources`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `staff`
-- 

CREATE TABLE IF NOT EXISTS `staff` (
  `aid` int(7) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `picture` varchar(254) default NULL,
  `firstname` varchar(200) NOT NULL default '',
  `lastname` varchar(200) NOT NULL default '',
  `title` varchar(200) NOT NULL default '',
  `text` text NOT NULL,
  `email` varchar(254) NOT NULL default '',
  `showorder` int(2) NOT NULL default '0',
  `stackorder` varchar(2) NOT NULL default '',
  PRIMARY KEY  (`aid`),
  UNIQUE KEY `ID` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `staff`
-- 



-- --------------------------------------------------------

-- 
-- Table structure for table `staffcategory`
-- 

CREATE TABLE IF NOT EXISTS `staffcategory` (
  `categoryid` tinyint(5) NOT NULL auto_increment,
  `categoryname` varchar(254) NOT NULL default '',
  `showorder` int(2) NOT NULL default '0',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `staffcategory`
-- 

INSERT INTO `staffcategory` VALUES (1, 'Executive', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `subcategory`
-- 

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategoryid` tinyint(2) NOT NULL auto_increment,
  `subcategoryname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`subcategoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `subcategory`
-- 

INSERT INTO `subcategory` VALUES (1, 'Navigation Level Page');
INSERT INTO `subcategory` VALUES (2, 'Secondary Navigation');
INSERT INTO `subcategory` VALUES (3, 'BOARD-ONLY Navigation');
INSERT INTO `subcategory` VALUES (4, 'BOTTOM Navigation');
INSERT INTO `subcategory` VALUES (5, 'Drop-Down Page');
INSERT INTO `subcategory` VALUES (6, 'Stand-Alone Page');
INSERT INTO `subcategory` VALUES (7, 'BOARD-ONLY DROP-DOWN Navigation');
INSERT INTO `subcategory` VALUES (8, 'Logged-in Members');
INSERT INTO `subcategory` VALUES (9, 'NO SHOW');
INSERT INTO `subcategory` VALUES (10, 'Flyout Menu');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `testimonialcontent` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` varchar(14) NOT NULL default '',
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL default '',
  `location` varchar(150) NOT NULL default '',
  `showorder` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 ;



-- 
-- Table structure for table `users`
-- 

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('ADMINUSERNAME', '0ea6d6035s3he57s553e2d96bf859ec6', '3f3f79afds350vh94c0e158csda391b4', 9, 'YOUREMAILGOESHERE@COMPANY.com', 1248382900);


CREATE TABLE IF NOT EXISTS `pressreleasecategory` (
  `categoryid` tinyint(2) NOT NULL auto_increment,
  `categoryname` varchar(254) NOT NULL default '',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `inthenews` (
  `id` int(4) NOT NULL auto_increment,
  `datecreated` varchar(14) default NULL,
  `dateofrelease` varchar(14) default NULL,
  `category` int(5) default NULL,
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `source` varchar(254) NOT NULL default '',
  `filename` varchar(254) NOT NULL default '',
  `webslink` varchar(254) NOT NULL default '',
  `author` varchar(254) NOT NULL default '',
  `showorder` int(7) NOT NULL default '0',
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `videocategory` (
  `categoryid` int(4) NOT NULL auto_increment,
  `categoryname` varchar(50) NOT NULL default '',
  `showorder` int(4) NOT NULL default '0',
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(4) NOT NULL auto_increment,
  `date` varchar(14) default NULL,
  `category` char(2) default NULL,
  `subcategory` char(2) default NULL,
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `author` varchar(254) NOT NULL default '',
  `picture1` varchar(255) NOT NULL default '',
  `weblink` text NOT NULL,
  `showorder` int(5) default '1',
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=1 ;

