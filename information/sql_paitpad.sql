CREATE TABLE `paitpad`.`paitpad_docs` (
    `id` Integer PRIMARY KEY AUTO_INCREMENT, 
    `username` VARCHAR(32) NOT NULL , 
    `title` VARCHAR(64) NOT NULL , 
    `content` MEDIUMTEXT NOT NULL , 
    `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `date_edited` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `admin` BOOLEAN NOT NULL 
 ) ENGINE = InnoDB;




CREATE TABLE `paitpad`.`paitpad_members` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `password` VARCHAR(16000) NOT NULL,
    `email` CHAR(128) NOT NULL,
    `ip` CHAR(128) NOT NULL,
    `passwordreset` CHAR(128) NOT NULL,
    `actions` INTEGER NOT NULL,
    `admin` CHAR(128) NOT NULL
) ENGINE = InnoDB;


