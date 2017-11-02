-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 22, 2009 at 04:24 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `shop`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `books`
-- 

CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `books`
-- 

INSERT INTO `books` VALUES (1, 'PHP Can Ban', 'Kenny', 115);
INSERT INTO `books` VALUES (2, 'PHP Nang Cao', 'Kenny', 150);
INSERT INTO `books` VALUES (3, 'PHP Framework', 'Kenny', 300);
INSERT INTO `books` VALUES (4, 'Joomla Can Ban', 'Kenny', 100);
