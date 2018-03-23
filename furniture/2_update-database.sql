UPDATE `ps_employee` SET `passwd` = md5(CONCAT('WJK1Odwjt9QUoEsFZ4Oz6ao5058P99x3Qhj9oWdzZm3h0pgwN1ExFPf8','presthemes')), `email`='demo@presthemes.com' WHERE `ps_employee`.`id_employee`=1;

UPDATE ps_configuration SET `value`='1' where `name`='PS_SMARTY_CACHE';
UPDATE ps_configuration SET `value`='1' where `name`='PS_SMARTY_FORCE_COMPILE';
UPDATE ps_configuration SET `value`='0' where `name`='PS_REWRITING_SETTINGS';

UPDATE ps_shop_url SET `domain`='localhost';
UPDATE ps_shop_url SET `domain_ssl`='localhost';
UPDATE ps_shop_url SET `physical_uri`='/furniture/';
