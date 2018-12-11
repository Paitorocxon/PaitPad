<?php
/** 
*   
*   @title:     conf
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   31.07.2018
*   @version:   1.0
*   
**/ 

error_reporting(E_ERROR | E_PARSE);

// DATABASE CONFIG
$GLOBALS['DATABASE_HOST'] = 'localhost';
$GLOBALS['DATABASE_NAME'] = 'paitpad';
$GLOBALS['DATABASE_USERNAME'] =  'root';
$GLOBALS['DATABASE_PASSWORD'] =  'root';

//WEBSITE CONFIG
$GLOBALS['WEBSITE_TITLE'] = 'PaitPad';
$GLOBALS['WEBSITE_LANGUAGE'] = 'english';
$GLOBALS['WEBSITE_STYLESHEET'] = 'styles/paitpad.css';
$GLOBALS['WEBSITE_PUBLIC'] = false;


//META CONFIG
$GLOBALS['META_AUTHOR'] = 'PaitPad';
$GLOBALS['META_PUBLISHER'] = 'PaitPad';
$GLOBALS['META_COPYRIGHT'] = 'PaitPad';
$GLOBALS['META_DESCRIPTION'] = 'PaitPad';

//WEBCRAWLER
$GLOBALS['WEBCRAWLER_REVISITE'] = '10 days';
$GLOBALS['WEBCRAWLER_KEYWORDS'] = 'paitpad';


//SECURITY CONFIG
$GLOBALS['SECURITY_ONLYADMINCANDELETE'] = 1;
