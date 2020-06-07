CREATE TABLE IF NOT EXISTS `#__rw_accounts_domains` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT 1,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`code` VARCHAR(4)  NOT NULL ,
`areaname` VARCHAR(255)  NOT NULL ,
`groupname` VARCHAR(255)  NOT NULL ,
`domain` VARCHAR(255)  NOT NULL ,
`status` VARCHAR(255)  NOT NULL ,
`web_master` VARCHAR(255)  NOT NULL ,
`user` INT(11)  NOT NULL ,
`notes` TEXT NOT NULL ,
`latitude` DOUBLE,
`longitude` DOUBLE,
`created` DATETIME NOT NULL ,
`modified` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `content_history_options`)
SELECT * FROM ( SELECT 'Domain','com_rw_accounts.domain','{"special":{"dbtable":"#__rw_accounts_domains","key":"id","type":"Domain","prefix":"Rw_accountsTable"}}', '{"formFile":"administrator\/components\/com_rw_accounts\/models\/forms\/domain.xml", "hideFields":["checked_out","checked_out_time","params","language" ,"notes"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_rw_accounts.domain')
) LIMIT 1;
