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
    } else {
        die("<h1>Whoops!</h1><br>'".$error."' was not found in the error catalog! :/ sowwy?");
    }
}