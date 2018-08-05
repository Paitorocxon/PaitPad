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

  $GLOBALS['DATABASE_HOST'] = 'MYSQL HOST (standard is localhost)';<br>
  $GLOBALS['DATABASE_NAME'] = 'YOUR NAME HOW YOU CALLED THE PAITPAD DATABASE';<br>
  $GLOBALS['DATABASE_USERNAME'] = 'MYSQL DATABASE USERNAME';<br>
  $GLOBALS['DATABASE_PASSWORD'] = 'MYSQL DATABASE PASSWORD OF THE USERNAME';<br>

  //WEBSITE CONFIG<br>
  $GLOBALS['WEBSITE_TITLE'] = 'YOUR PAITPAD WEBSITE TITLE';<br>
  $GLOBALS['WEBSITE_LANGUAGE'] = 'YOUr LANGUAGE FILE (standard is english)';<br>
  $GLOBALS['WEBSITE_STYLESHEET'] = 'YOUR STYLE (can be found in **/styles** folder)';<br>
  $GLOBALS['WEBSITE_PUBLIC'] = (true=no one needs to log in/false = you need to be logged in);<br>

  //META CONFIG<br>
  $GLOBALS['META_AUTHOR'] = 'YOUR AUTHOR';<br>
  $GLOBALS['META_PUBLISHER'] = 'YOUR PUBLISHER';<br>
  $GLOBALS['META_COPYRIGHT'] = 'YOUR COPYRIGHT';<br>
  $GLOBALS['META_DESCRIPTION'] = 'YOUR PAITPAD DESCRIPTION';<br>

4. Connect to your MySQL server, log in and create a new database<br>
  **CREATE DATABASE paitpad**<br>

5. Create the PaitPad Tables. Don't forget to connect to the paitpad database first!<br>

  CREATE TABLE `paitpad`.`paitpad_docs` (<br>
      `id` Integer PRIMARY KEY AUTO_INCREMENT, <br>
      `username` VARCHAR(32) NOT NULL , <br>
      `title` VARCHAR(64) NOT NULL , <br>
      `content` MEDIUMTEXT NOT NULL , <br>
      `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , <br>
      `date_edited` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , <br>
      `admin` BOOLEAN NOT NULL <br>
   ) ENGINE = InnoDB;<br>

  CREATE TABLE `paitpad`.`paitpad_members` (<br>
      `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,<br>
      `username` VARCHAR(30) NOT NULL,<br>
      `password` VARCHAR(16000) NOT NULL,<br>
      `email` CHAR(128) NOT NULL,<br>
      `ip` CHAR(128) NOT NULL,<br>
      `passwordreset` CHAR(128) NOT NULL,<br>
      `actions` INTEGER NOT NULL,<br>
      `admin` CHAR(128) NOT NULL<br>
  ) ENGINE = InnoDB;<br>

"Password is really VARCHAR?" Jepp. But before you lose your mind. PaitPad uses it's own crypting method. so, keep calm.<br>

6. Create your first Administrative account.<br>
  INSERT INTO paitpad.paitpad_members (username,password,email,ip,passwordreset,admin) VALUES ('admin','password','I do not think you really need one but okay','localhost',0,0,1)<br>
  
7. Login to PaitPad<br>

