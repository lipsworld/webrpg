ALTER TABLE `characters`
  ADD COLUMN `class` VARCHAR(10) NOT NULL AFTER `userId`,
  ADD COLUMN `gender` TINYINT(1) UNSIGNED NOT NULL AFTER `class`;