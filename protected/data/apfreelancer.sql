-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2013 at 05:02 PM
-- Server version: 5.5.31-0ubuntu0.12.04.2
-- PHP Version: 5.4.15-1~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `apfreelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id_attachment` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_pm` bigint(20) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `mimetype` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_attachment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `id_balance` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `pri` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'primary currency',
  `currency` varchar(3) NOT NULL,
  `balance` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_balance`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=422 ;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `id_bidder` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-normal,0-retract,2-wait for provider,3-won',
  `fk_bidder` bigint(20) NOT NULL,
  `fk_owner` bigint(20) NOT NULL,
  `fk_project` bigint(20) NOT NULL,
  `price` float(10,2) NOT NULL,
  `within` int(11) NOT NULL,
  `description` text NOT NULL,
  `noticeemail` tinyint(1) NOT NULL DEFAULT '0',
  `noticesms` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bidder`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL DEFAULT '0',
  `blogtitle` varchar(1024) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id_blog_category` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `description` text,
  `fk_blog` bigint(20) NOT NULL DEFAULT '0',
  `fk_blog_category` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_blog_category`),
  KEY `blogid` (`fk_blog`),
  KEY `parentid` (`fk_blog_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_catpost`
--

CREATE TABLE IF NOT EXISTS `blog_catpost` (
  `id_blog_catpost` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_blog_category` bigint(20) NOT NULL,
  `fk_post` bigint(20) NOT NULL,
  PRIMARY KEY (`id_blog_catpost`),
  KEY `catid` (`fk_blog_category`),
  KEY `postid` (`fk_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id_blog_comment` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_post` bigint(20) NOT NULL,
  `fk_blog_comment` bigint(20) NOT NULL DEFAULT '0',
  `fk_user` bigint(20) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `ip` varchar(16) NOT NULL,
  `author` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_blog_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=307 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `id_blog_post` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL DEFAULT '0',
  `fk_blog` bigint(20) NOT NULL,
  `guid` varchar(128) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `mimetype` varchar(32) DEFAULT NULL,
  `fk_blog_post` bigint(20) NOT NULL DEFAULT '0',
  `status` varchar(32) NOT NULL DEFAULT 'publish' COMMENT 'public,private,password,draft,inherit',
  `type` varchar(32) NOT NULL DEFAULT 'post' COMMENT 'post,attachment',
  `tags` varchar(1024) DEFAULT NULL,
  `allow_comment` tinyint(1) NOT NULL DEFAULT '0',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blog_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE IF NOT EXISTS `blog_tag` (
  `id_blog_tag` bigint(20) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '分类表',
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '分类的名称',
  `name_cn` varchar(255) NOT NULL,
  `name_zh` varchar(255) NOT NULL,
  `description` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_category` bigint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_category`),
  KEY `name_cn` (`name_cn`),
  KEY `name_en` (`name_en`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL DEFAULT '0' COMMENT 'userid=0 means non-registered user',
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `code` varchar(32) NOT NULL,
  `replied` text,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` bigint(20) NOT NULL AUTO_INCREMENT,
  `tcc` varchar(6) DEFAULT NULL COMMENT 'Telephone country codes ',
  `country_en` varchar(512) NOT NULL,
  `country_cn` varchar(512) DEFAULT NULL,
  `country_zh` varchar(512) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_country`),
  KEY `country_en` (`country_en`(255)),
  KEY `country_cn` (`country_cn`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
  `id_deposit` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `source` varchar(32) NOT NULL COMMENT 'paypal,moneybookers...',
  `currency` varchar(3) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `fee` float(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-init,1-finish',
  `byadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'added by admin?',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_deposit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `earning`
--

CREATE TABLE IF NOT EXISTS `earning` (
  `id_earning` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `fk_referred_user` bigint(20) NOT NULL,
  `source` tinyint(4) NOT NULL COMMENT '0-Project fee taken(seller),1-Commissions fee taken(buyer),2-gold member fee token',
  `reserve1` bigint(20) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `status` tinyint(4) NOT NULL COMMENT '0-pendding,1-paid,9999-cancel',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_earning`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `id_email_template` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyname` varchar(255) NOT NULL,
  `params` varchar(1024) DEFAULT NULL,
  `description` text,
  `subject_cn` varchar(1024) NOT NULL,
  `content_cn` text NOT NULL,
  `subject_en` varchar(1024) NOT NULL,
  `content_en` text NOT NULL,
  `subject_zh` varchar(1024) NOT NULL,
  `content_zh` text NOT NULL,
  `pubdate` datetime NOT NULL,
  PRIMARY KEY (`id_email_template`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `escrow`
--

CREATE TABLE IF NOT EXISTS `escrow` (
  `id_escrow` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_sender` bigint(20) NOT NULL,
  `fk_receiver` bigint(20) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `bidid` bigint(20) NOT NULL DEFAULT '0',
  `type` varchar(16) NOT NULL COMMENT 'Full,Partial,Other',
  `reason` varchar(1024) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0-init,1-finish,9999-cancel',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_escrow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `fk_user` bigint(20) NOT NULL,
  `reservedid1` bigint(20) DEFAULT NULL,
  `reservedid2` bigint(20) DEFAULT NULL,
  `reservedid3` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=291 ;

-- --------------------------------------------------------

--
-- Table structure for table `exproject`
--

CREATE TABLE IF NOT EXISTS `exproject` (
  `id_project` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `originalurl` varchar(255) NOT NULL,
  `exid` int(11) DEFAULT NULL COMMENT '外部编号,可为空',
  `description` text NOT NULL,
  `siteid` bigint(20) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime DEFAULT NULL,
  `hitcounter` bigint(20) NOT NULL DEFAULT '0',
  `budgettype` int(11) NOT NULL DEFAULT '1' COMMENT '1-full project,2-per day,3-per hour',
  `budget` varchar(128) NOT NULL DEFAULT '未知' COMMENT '项目预算',
  `keywords` varchar(1024) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-open,3-closed',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bnotification` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_project`),
  KEY `siteid` (`siteid`),
  KEY `starttime` (`starttime`),
  KEY `endtime` (`endtime`),
  KEY `keywords` (`keywords`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=221625 ;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_en` text NOT NULL,
  `answer_en` text,
  `question_cn` text,
  `answer_cn` text,
  `abbreviation` text,
  `fk_faq` bigint(20) NOT NULL DEFAULT '0',
  `category` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'is category? answer should be null',
  `hit` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE IF NOT EXISTS `favourite` (
  `id_favourite` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0-project,1-exproject,2-homepage',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_favourite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121654 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(128) NOT NULL,
  `ownerid` bigint(20) NOT NULL DEFAULT '0',
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-public,0-private',
  `lang` varchar(3) NOT NULL DEFAULT 'en',
  `description` text NOT NULL,
  `membercount` bigint(20) NOT NULL DEFAULT '0' COMMENT '成员个数',
  `adddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_reply`
--

CREATE TABLE IF NOT EXISTS `group_reply` (
  `id_group_reply` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_group` bigint(20) NOT NULL,
  `fk_group_topic` bigint(20) NOT NULL,
  `fk_user` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_group_reply`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_topic`
--

CREATE TABLE IF NOT EXISTS `group_topic` (
  `id_group_topic` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_group` bigint(20) NOT NULL,
  `fk_user` bigint(20) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `hit_counter` bigint(20) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_group_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `id_help` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_en` text NOT NULL,
  `title_cn` text,
  `title_zh` text,
  `content_en` text NOT NULL,
  `content_cn` text,
  `content_zh` text,
  `abbreviate` varchar(255) NOT NULL,
  `fk_help_category` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id_help`),
  UNIQUE KEY `Abbreviate` (`abbreviate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `help_category`
--

CREATE TABLE IF NOT EXISTS `help_category` (
  `id_help_category` bigint(20) NOT NULL AUTO_INCREMENT,
  `name_en` text NOT NULL,
  `name_cn` text,
  `name_zh` text,
  `abbreviate` varchar(255) NOT NULL,
  `fk_help_category` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_help_category`),
  UNIQUE KEY `Abbreviate` (`abbreviate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `id_keyword` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(128) NOT NULL,
  `counter` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_keyword`),
  KEY `keyword` (`keyword`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44755 ;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_link` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `site` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_paid`
--

CREATE TABLE IF NOT EXISTS `member_paid` (
  `id_member_paid` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `currency` varchar(3) NOT NULL,
  `payment_option` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_member_paid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsid` bigint(20) NOT NULL AUTO_INCREMENT,
  `newsclass` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `article` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `hit` bigint(20) NOT NULL DEFAULT '0',
  `keyword` text COMMENT 'keyword for news',
  `pubdate` datetime NOT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `newscategory`
--

CREATE TABLE IF NOT EXISTS `newscategory` (
  `newsclass` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`newsclass`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `newscomments`
--

CREATE TABLE IF NOT EXISTS `newscomments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `newsid` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `userid` bigint(20) NOT NULL DEFAULT '0',
  `pubdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pmb`
--

CREATE TABLE IF NOT EXISTS `pmb` (
  `id_pmb` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_project` bigint(20) NOT NULL,
  `fk_user` bigint(20) NOT NULL,
  `receiverid` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 means clarification board,0 means private message board',
  `ifread` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pmb`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id_portfolio` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `completed_at` date NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `hitcounter` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_portfolio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `budget` int(11) NOT NULL DEFAULT '0' COMMENT '0~5,0 means free budget',
  `minbudget` bigint(20) NOT NULL DEFAULT '0',
  `maxbudget` bigint(20) NOT NULL DEFAULT '0',
  `bidperiod` int(11) NOT NULL DEFAULT '1',
  `ownerid` bigint(20) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `forgoldmembers` tinyint(1) NOT NULL DEFAULT '0',
  `nonpublic` tinyint(1) NOT NULL DEFAULT '0',
  `hidebids` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-draft(init),1-open,2-frozen,3-close,9999-closed by owner',
  `type` varchar(32) NOT NULL DEFAULT 'normal' COMMENT 'normal,trial,draft',
  `winner` bigint(20) NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'keywords for projects',
  `createdate` datetime NOT NULL,
  `start_date` datetime DEFAULT NULL COMMENT 'project start time',
  `finish_date` datetime DEFAULT NULL COMMENT 'project end time',
  `hitcounter` bigint(20) NOT NULL DEFAULT '0',
  `filename` varchar(128) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `minprice` float DEFAULT NULL,
  `maxprice` float DEFAULT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'send notification to users(opened projects)',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_comment`
--

CREATE TABLE IF NOT EXISTS `project_comment` (
  `id_project_comment` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `userid` bigint(20) NOT NULL DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `exp` tinyint(1) NOT NULL DEFAULT '1',
  `projectid` bigint(20) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_project_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id_rating` bigint(20) NOT NULL AUTO_INCREMENT,
  `buyerorprovider` tinyint(1) NOT NULL COMMENT 'for 1-buyer,0-provider',
  `rating` tinyint(4) NOT NULL COMMENT '0-10',
  `comments` text NOT NULL,
  `feedback` text COMMENT 'comment feedback',
  `bidid` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actived_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratingvotes`
--

CREATE TABLE IF NOT EXISTS `ratingvotes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pubdate` datetime NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'project' COMMENT 'project,exproject',
  `rating` int(11) NOT NULL COMMENT '1-5',
  `reservedid1` bigint(20) NOT NULL,
  `reservedid2` bigint(20) NOT NULL,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `relevant_file`
--

CREATE TABLE IF NOT EXISTS `relevant_file` (
  `id_relevant_file` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_project` bigint(20) NOT NULL DEFAULT '0',
  `description` text,
  `relevantid` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_relevant_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id_search` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `hitcounter` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_search`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id_site` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `introduce` text NOT NULL,
  `commissiondesc` text,
  `lang` varchar(32) NOT NULL DEFAULT 'cn',
  `script` varchar(128) NOT NULL,
  `updateinterval` int(11) NOT NULL DEFAULT '4' COMMENT '更新时间间隔,单位是小时',
  `updatedtime` datetime DEFAULT NULL,
  `failedcount` int(11) NOT NULL DEFAULT '0',
  `bupdate` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id_state` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_country` bigint(20) NOT NULL,
  `state_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_zh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=94 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id_transaction` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `fk_sender` bigint(20) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `source` int(11) NOT NULL COMMENT '0-Refundable project fee taken,1-withdraw,2-transfer,3-Project fee taken,4-escrow,5-gold member fee token,6-deposit money,7-project related fees',
  `reserve1` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `id_transfer` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_sender` bigint(20) NOT NULL,
  `fk_receiver` bigint(20) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `fk_bid` bigint(20) NOT NULL DEFAULT '0',
  `type` varchar(16) NOT NULL COMMENT 'Full,Partial,Other',
  `reason` text,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transfer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id_upload` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `utype` int(11) NOT NULL COMMENT '1-group topic－attachment,2-group reply-attachment,3-group topic-pictures,4-group reply-pictures,5-portfolio-attachments,6-portfolio-pictures',
  `ureservedid1` bigint(20) NOT NULL DEFAULT '0',
  `ureservedid2` bigint(20) NOT NULL DEFAULT '0',
  `ureservedid3` bigint(20) NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `length` bigint(20) NOT NULL DEFAULT '0',
  `mimetype` varchar(32) DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT '0' COMMENT '是否使用过该附件',
  `downloadtimes` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_upload`),
  KEY `ureservedid1` (`ureservedid1`),
  KEY `ureservedid2` (`ureservedid2`),
  KEY `ureservedid3` (`ureservedid3`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-male,0-female',
  `email` varchar(128) NOT NULL,
  `verification` varchar(64) DEFAULT NULL,
  `regstatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-step1(wait for verification),1-step2(fill details),2-normal account',
  `logo` varchar(255) DEFAULT NULL,
  `recommender` bigint(20) NOT NULL DEFAULT '0' COMMENT 'recommender user-store userid',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(64) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` bigint(20) NOT NULL DEFAULT '0',
  `country` bigint(20) NOT NULL DEFAULT '0',
  `zipcode` varchar(16) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `hourlyrate` float NOT NULL DEFAULT '0',
  `profile` text,
  `favouritecat` text,
  `lastvisitdate` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buyerrating` bigint(20) NOT NULL DEFAULT '0',
  `buyerreviews` bigint(20) NOT NULL DEFAULT '0',
  `sellerrating` bigint(20) NOT NULL DEFAULT '0',
  `sellerreviews` bigint(20) NOT NULL DEFAULT '0',
  `smscredit` bigint(20) NOT NULL DEFAULT '0',
  `bgoldmember` tinyint(1) NOT NULL DEFAULT '0',
  `bmonthly` tinyint(1) NOT NULL DEFAULT '0',
  `payuntil` datetime DEFAULT NULL,
  `latestrefreshtime` datetime NOT NULL,
  `postedbid` int(11) NOT NULL DEFAULT '0' COMMENT 'bid has posted, for providers',
  `mobile` varchar(32) DEFAULT NULL,
  `mcemail` varchar(128) DEFAULT NULL COMMENT '已经请求更改邮件地址',
  `mcverification` varchar(64) DEFAULT NULL COMMENT '更改邮件地址的验证码',
  `bnews` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'receive news notification',
  `bprojects` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'receive projects notification',
  `coverage` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'coverage of mobile phone number',
  `sp_background` varchar(32) DEFAULT NULL,
  `latestvisit` text COMMENT 'latest visit projects',
  `preferlang` varchar(3) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=420 ;

-- --------------------------------------------------------

--
-- Table structure for table `userssearch`
--

CREATE TABLE IF NOT EXISTS `userssearch` (
  `id_user_search` bigint(11) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `fk_search` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_user_search`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id_user_group` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `fk_group` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_user_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE IF NOT EXISTS `violation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `reserve1` bigint(20) NOT NULL DEFAULT '0',
  `violator` bigint(20) NOT NULL,
  `reason` tinyint(4) NOT NULL,
  `comments` text NOT NULL,
  `userid` bigint(20) NOT NULL,
  `pubdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0-profile,1-project,2-exproject',
  `reservedid1` bigint(20) NOT NULL,
  `visitorid` int(11) NOT NULL,
  `pubdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=170 ;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `processingtime` datetime NOT NULL,
  `userid` bigint(20) NOT NULL,
  `requesttime` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `fee` float(10,2) NOT NULL DEFAULT '0.00',
  `source` int(11) NOT NULL DEFAULT '0' COMMENT '0-paypal,1-moneybooker, other payment',
  `account` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '9999-cancel,0-init,1-finish',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
