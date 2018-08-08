<?php
/**
*
*   @title:     PaitPad
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   31.07.2018
*   @version:   1.0
*   
*/

session_start();
require_once('grabwutever.php');
require_once('conf.php');

if (file_exists('lang/'.$GLOBALS['WEBSITE_LANGUAGE'].'.php')) {
    require_once('lang/'.$GLOBALS['WEBSITE_LANGUAGE'].'.php');
}



//######Functions
fuckdizfuckers();
head();


if (!$GLOBALS['WEBSITE_PUBLIC']) {
    if (!login()) {
        if (isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['passwordconf']) && isset($_REQUEST['email'])) {
            register(); 
            die('registriert!');
        } else {
            die ('<center>'.loginUI().'</center>');
        }
    } elseif (isset($_REQUEST['l']) && $_REQUEST['l']=='ogout') {
        logout();
    }
} else {
    session_destroy();
    $_SESSION['username'] = getUserIP();
    $_SESSION['password'] = '';
    $_SESSION['admin'] = 1;
    $_SESSION['actions'] = 0;
    $_SESSION['id'] = 999999999999999999;
    $_SESSION['ip'] = getUserIP();
    $_SESSION['passwordreset'] = 0;
    $_SESSION['email'] = '';
}

menubar();

body_start();

countSQL();

if (isset($_REQUEST['q']) && strlen($_REQUEST['q'])> 2) {
    
    askSQL($_REQUEST['q']);
    
} elseif (isset($_REQUEST['id'])) {
    
    getSQL($_REQUEST['id']);
    
} elseif (isset($_REQUEST['content']) && isset($_REQUEST['title'])) {
    if (isset($_REQUEST['admin'])) {
        if ($_SESSION['admin']) {
            echo putSQL($_REQUEST['content'],$_REQUEST['title'],$_REQUEST['admin']); 
        }
    } else {
        echo putSQL($_REQUEST['content'],$_REQUEST['title'],0);         
    }
    
} elseif (isset($_REQUEST['del'])) {
    echo delSQL($_REQUEST['del']); 
} elseif (isset($_REQUEST['message'])) {
    echo $_REQUEST['message']; 
} elseif (isset($_REQUEST['c'])) {
    editor(); 
} else {
}
//CREATE DOCUMENT = CONTENT/TITLE/ADMIN
//DELETE DOCUMENT = DEL=ID
//READ DOCUMENT = ID=ID



body_end();