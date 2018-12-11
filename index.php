<?php
/**
*
*   @title:     PaitPad
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   31.07.2018
*   @version:   1.0
*   
*/

session_start([
    'cookie_lifetime' => 86400,
]);

require_once('grabwutever.php');
require_once('conf.php');

$_SESSION['test'] = 'SESSION VARIABLE IS DECLARED!';



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
		echo '<center><div class="window"><div class="title">Bye!</div><a href="index.php">Exit PaitPad</a></div></center>';
        logout();
		die();
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



body_start();

menubar();
countSQL();



if(isset($_REQUEST['ccc'])){
	if ($_SESSION['admin'] == 1) {
		if(isset($_REQUEST['id']) && isset($_REQUEST['newemail']) && isset($_REQUEST['willBeAdmin']) && isset($_REQUEST['willBePasswortreset'])){
			upgradeUser($_REQUEST['id'],$_REQUEST['newemail'],$_REQUEST['willBePasswortreset'],$_REQUEST['willBeAdmin']);
		}
	}

}elseif (isset($_REQUEST['q']) && strlen($_REQUEST['q'])> 2) {
    askSQL($_REQUEST['q']);
} elseif (isset($_REQUEST['content']) && isset($_REQUEST['title']) && isset($_REQUEST['id'])) {
    if (isset($_REQUEST['admin'])) {
        if ($_SESSION['admin'] == 1) {
            echo updateSQL($_REQUEST['content'],$_REQUEST['title'],$_REQUEST['admin'],$_REQUEST['id']); 
        }
    } else {            
        echo updateSQL($_REQUEST['content'],$_REQUEST['title'],0,$_REQUEST['id']); 
    }
} elseif (isset($_REQUEST['content']) && isset($_REQUEST['title'])) {
    if (isset($_REQUEST['admin'])) {
        if ($_SESSION['admin']) {
            echo putSQL($_REQUEST['content'],$_REQUEST['title'],$_REQUEST['admin']); 
        }
    } else {
        echo putSQL($_REQUEST['content'],$_REQUEST['title'],0);         
    }
} elseif (isset($_REQUEST['id'])) {
    getSQL($_REQUEST['id']);
} elseif (isset($_REQUEST['del'])) {
    echo delSQL($_REQUEST['del']); 
} elseif (isset($_REQUEST['message'])) {
    echo $_REQUEST['message']; 
} elseif (isset($_REQUEST['c'])) {
    editor(); 
} elseif (isset($_REQUEST['edit'])) {
    editor();
} elseif (isset($_REQUEST['administration'])) {
    administration();
} elseif (isset($_REQUEST['info'])) {
    if ($_SESSION['admin'] == 1){
        echo '<div class="document"><div class="title">Docs</div>';
        versionCheck();
        echo '</div>';
    } else {
        error('0x003');
    }
    
} else {
    $documentArr = array();
    $i = 0;
    echo '<div class="document"><div class="title">Docs</div>';
    foreach(getEntrysSQL() as $id => $title){
        if (getAdminSQL($id) == 1 && $_SESSION['admin'] == 1){
            array_push($documentArr,'<a title="'.$title.'" href="?id='.$id.'">'.$title.'</a><br>');
        } elseif (getAdminSQL($id) == 0){
            array_push($documentArr,'<a title="'.$title.'" href="?id='.$id.'">'.$title.'</a><br>');
        }
        $i++;
    }
    sort($documentArr);
    foreach($documentArr as $entry){
        echo $entry;
    }
    echo '<hr>Docs:'.$i;
    echo '</div>';
}
//CREATE DOCUMENT = CONTENT/TITLE/ADMIN
//DELETE DOCUMENT = DEL=ID
//READ DOCUMENT = ID=ID


body_end();