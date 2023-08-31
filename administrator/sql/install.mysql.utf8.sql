CREATE TABLE IF NOT EXISTS `#__rw_accounts_domains` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NULL  DEFAULT 0,
`state` TINYINT(1)  NULL  DEFAULT 1,
`checked_out` INT(11)  UNSIGNED,
`checked_out_time` DATETIME NULL  DEFAULT NULL ,
`created_by` INT(11)  NULL  DEFAULT 0,
`modified_by` INT(11)  NULL  DEFAULT 0,
`code` VARCHAR(4)  NOT NULL ,
`areaname` VARCHAR(255)  NULL  DEFAULT "",
`groupname` VARCHAR(255)  NULL  DEFAULT "",
`domain` VARCHAR(255)  NULL  DEFAULT "",
`status` VARCHAR(255)  NULL  DEFAULT "",
`web_master` VARCHAR(255)  NOT NULL ,
`user` INT(11)  NOT NULL ,
`notes` TEXT NULL ,
`latitude` DOUBLE NULL ,
`longitude` DOUBLE NULL ,
`created` DATETIME NULL  DEFAULT NULL ,
`modified` DATETIME NULL  DEFAULT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `content_history_options`)
SELECT * FROM ( SELECT 'Domain','com_rw_accounts.domain','{"special":{"dbtable":"#__rw_accounts_domains","key":"id","type":"DomainTable","prefix":"Joomla\\\\Component\\\\Rw_accounts\\\\Administrator\\\\Table\\\\"}}', CASE 
                                    WHEN 'rules' is null THEN ''
                                    ELSE ''
                                    END as rules, CASE 
                                    WHEN 'field_mappings' is null THEN ''
                                    ELSE ''
                                    END as field_mappings, '{"formFile":"administrator\/components\/com_rw_accounts\/forms\/domain.xml", "hideFields":["checked_out","checked_out_time","params","language" ,"notes"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_rw_accounts.domain')
) LIMIT 1;
