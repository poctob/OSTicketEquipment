ALTER TABLE `%TABLE_PREFIX%config` ADD COLUMN `enable_equipment` TINYINT(1) NOT NULL DEFAULT 0 ;
ALTER TABLE `%TABLE_PREFIX%groups` ADD COLUMN `can_manage_equipment` TINYINT(1) NOT NULL DEFAULT 0 ;


CREATE TABLE `%TABLE_PREFIX%equipment` (
  `equipment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ispublished` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text,
  `serialnumber` tinytext,
  `notes` text,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`equipment_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8

CREATE TABLE `%TABLE_PREFIX%equipment_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ispublic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(125) DEFAULT NULL,
  `description` text NOT NULL,
  `notes` tinytext NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `ispublic` (`ispublic`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8

CREATE TABLE `%TABLE_PREFIX%equipment_status` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) DEFAULT NULL,
  `description` text NOT NULL,
  `image` text,
  `color` varchar(45) DEFAULT NULL,
  `baseline` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8

CREATE TABLE `%TABLE_PREFIX%equipment_ticket` (
  `equipment_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`equipment_id`,`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%plugin` (
  `plugin_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(256) NOT NULL ,
  `is_installed` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`plugin_id`) );

INSERT INTO `%TABLE_PREFIX%plugin` (`name`, `is_installed`) VALUES ('equipment, 1');