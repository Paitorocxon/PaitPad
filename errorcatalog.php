<?php
/**
*
*   @title:     errorCatalog
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   08.08.2018
*   @version:   1.0
*   
*/
if (isset($_REQUEST['error'])) {
    $error = htmlspecialchars($_REQUEST['error']);
    if ($error == '0x001') {
        die("The user does not have the permission to read that document.<br>Solve:<br>Set the Documents priority to 0 (ZERO) OR set the users permission to 1 (ONE).");
    } elseif ($error == '0x002') {
        die('The user does not have the permission to delete that document.<br>Solve:<br>Set the users permission to 1 (ONE) OR set the <i>$GLOBALS[\'SECURITY_ONLYADMINCANDELETE\']</i> to <i>false</i>.');
    } elseif ($error == '0x003') {
        die('The user does not have the permission to get the website\'s information page.');
    } elseif ($error == '0x004') {
        die('The user does not have the permission to get access to the adminpanel.');
    } elseif ($error == '1x001') {
        die('The [admin]-request was manipulated!');
    } elseif ($error == '1x002') {
        die('The [del]-request was manipulated!');
    } elseif ($error == '2x001') {
        die('function "putSQL" did not worked well');
    } elseif ($error == '2x002') {
        die('function "updateSQL" did not worked well');
    } elseif ($error == '2x003') {
        die('function "delSQL" did not worked well');
    } elseif ($error == '2x004') {
        die('function "askSQL" did not worked well');
    } elseif ($error == '2x005') {
        die('function "getSQL" did not worked well');
    } elseif ($error == '2x006') {
        die('function "getContentSQL" did not worked well');
    } elseif ($error == '2x007') {
        die('function "getTitleSQL" did not worked well');
    } elseif ($error == '2x008') {
        die('function "getAdminSQL" did not worked well');
    } elseif ($error == '2x009') {
        die('function "getUserIP" did not worked well');
    } elseif ($error == '2x010') {
        die('function "comparedIdentitys" did not worked well');
    } elseif ($error == '2x011') {
        die('exception: "UserDidntReadInstructionsException"<br>function "login" fucked up! Check your config.php file... wtf, dude!');
    } else {
        die("<h1>Whoops!</h1><br>'".$error."' was not found in the error catalog! :/ sowwy?");
    }
}