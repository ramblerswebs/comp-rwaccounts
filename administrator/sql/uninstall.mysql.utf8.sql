DROP TABLE IF EXISTS `#__rw_accounts_domains`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_rw_accounts.%');