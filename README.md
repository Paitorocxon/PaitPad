# PaitPad
~How docs it work?
*Small and simple document tool. Use it for recipes, notes or your own personal library.*

**STILL IN DEVELOPMENT!**

## Requirement
- Apache 2
- PHP 5.1 (at least. php 7 is quite better and has more performance)
- MySQL

##Installation
1. Download all files from this repository (e.g. /var/www/(html))
2. Create a new folder (e.g. "paitpad")
3. Open the **conf.php** file in the paitpad folder and set it up

  $GLOBALS['DATABASE_HOST'] = 'MYSQL HOST (standard is localhost)';
  $GLOBALS['DATABASE_NAME'] = 'YOUR NAME HOW YOU CALLED THE PAITPAD DATABASE';
  $GLOBALS['DATABASE_USERNAME'] = 'MYSQL DATABASE USERNAME';
  $GLOBALS['DATABASE_PASSWORD'] = 'MYSQL DATABASE PASSWORD OF THE USERNAME';

  //WEBSITE CONFIG
  $GLOBALS['WEBSITE_TITLE'] = 'YOUR PAITPAD WEBSITE TITLE';
  $GLOBALS['WEBSITE_LANGUAGE'] = 'YOUr LANGUAGE FILE (standard is english)';
  $GLOBALS['WEBSITE_STYLESHEET'] = 'YOUR STYLE (can be found in **/styles** folder)';
  $GLOBALS['WEBSITE_PUBLIC'] = (true=no one needs to log in/false = you need to be logged in);

  //META CONFIG
  $GLOBALS['META_AUTHOR'] = 'YOUR AUTHOR';
  $GLOBALS['META_PUBLISHER'] = 'YOUR PUBLISHER';
  $GLOBALS['META_COPYRIGHT'] = 'YOUR COPYRIGHT';
  $GLOBALS['META_DESCRIPTION'] = 'YOUR PAITPAD DESCRIPTION';

4. Connect to your MySQL server, log in and create a new database
  **CREATE DATABASE paitpad**

5. Create the PaitPad Tables. Don't forget to connect to the paitpad database first!

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

"Password is really VARCHAR?" Jepp. But before you lose your mind. PaitPad uses it's own crypting method. so, keep kalm.

6. Create your first Administrative account.
  INSERT INTO paitpad.paitpad_members (username,password,email,ip,passwordreset,admin) VALUES ('admin','password','I do not think you really need one but okay','localhost',0,0,1)
  
7. Login to PaitPad

