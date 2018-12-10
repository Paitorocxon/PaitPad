<?php
/**
*
*   @title:     builtsite
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   01.08.2018
*   @version:   1.0
*   
*/




    function head(){
        echo '<!DOCTYPE html>'."\n";
        echo '<HTML>'."\n";
        echo '    <HEAD>'."\n";
        echo '        <TITLE>'.$GLOBALS['WEBSITE_TITLE'].'</TITLE>'."\n";
        echo '        <meta name="title" content="'.$GLOBALS['WEBSITE_TITLE'].'">'."\n";
        echo '        <meta name="author" content="'.$GLOBALS['META_AUTHOR'].'">'."\n";
        echo '        <meta name="publisher" content="'.$GLOBALS['META_PUBLISHER'].'">'."\n";
        echo '        <meta name="copyright" content="'.$GLOBALS['META_COPYRIGHT'].'">'."\n";
        echo '        <meta name="description" content="'.$GLOBALS['META_DESCRIPTION'].'">'."\n";
        echo '        <meta name="abstract" content="'.$GLOBALS['META_DESCRIPTION'].'">'."\n";
        echo '        <meta http-equiv="content-type" content="text/html; charset=UTF-8">'."\n";
        echo '        <meta name="date" content="2018-08-01">'."\n";
        echo '        <meta name="expires" content="2029-08-01">'."\n";
        echo '        <meta name="revisit-after" content="'.$GLOBALS['WEBCRAWLER_REVISITE'].'">'."\n";
        echo '        <meta name="revisit" content="after '.$GLOBALS['WEBCRAWLER_REVISITE'].'">'."\n";
        echo '        <meta name="keywords" content="'.$GLOBALS['WEBCRAWLER_KEYWORDS'].'">'."\n";
        echo '        <link rel="stylesheet" type="text/css" href="'.$GLOBALS['WEBSITE_STYLESHEET'].'">'."\n";
        echo '        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
        echo '        <script type="text/javascript">function logout() { window.location.href = "?l=ogout";}</script>';
        echo '        <script type="text/javascript">function refreshtoindex() { window.location.href = "index.php";}</script>';
        echo '        <script type="text/javascript">function newfile() { window.location.href = "?c=reate";}</script>';
		

			echo '        <script type="text/javascript">function infopage() { window.location.href = "?info=gimmediz";}</script>';
			echo '        <script type="text/javascript">function admin() { window.location.href = "?administration=jepp";}</script>';

		
        echo '    </HEAD>'."\n";
    }
    function body_start(){
        echo '    <BODY></div>'."\n";
    }
    function body_end(){
        if ($_SESSION['admin'] == 1) {
            echo '<div class="userdisplay admin"><center>'.$_SESSION['username'].'<br><img src="img/user.png"></div></center>';
        } else {
            echo '<div class="userdisplay"><center>'.$_SESSION['username'].'<br><img src="img/user.png"></div></center>';
        }
        echo "\n".'        <div class="bottom">Powered by PaitPad. Copyright © 2018 by Fabian Müller</div>';
        echo "\n".'    </BODY>'."\n";
    }
    function loginUI(){
        return '<br><br><br> <div class="window"><div class="title">'.$GLOBALS['BUTTON_LOGIN'].'</div><form method="POST"><input type="text" id="username" name="username" placeholder="'.$GLOBALS['OVERLAY_USERNAME'].'"/><br><input type="password" id="password" name="password" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><br><input type="submit" value="'.$GLOBALS['BUTTON_LOGIN'].'"></form></div>            <br><br><br>              <div class="window"><div class="title">'.$GLOBALS['BUTTON_REGISTER'].'</div><form method="POST" action="index.php"><input type="text" id="username" name="username" placeholder="'.$GLOBALS['OVERLAY_USERNAME'].'"/><br><input type="email" name="email" id="email" placeholder="email"/> <br><input type="password" id="password" name="password" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><input type="password" id="passwordconf" name="passwordconf" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><br><input type="submit" id="sub" name="sub" value="'.$GLOBALS['BUTTON_REGISTER'].'"></form></div>';
    }
    function menubar(){
        $infobut = '';
        $q = '';
        $astring = '';
        if (isset($_REQUEST['q'])) {
            $q = $_REQUEST['q'];
        }
        if (!$GLOBALS['WEBSITE_PUBLIC']) {
            $astring = ' <input type="button" value="'.$GLOBALS['BUTTON_LOGOUT'].'"  onclick="logout()">';
        }
        if ($_SESSION['admin'] == 1) {
            $infobut = '<input type="button" onclick="infopage();" value="Info"> <input type="button" onclick="admin();" value="Adminpanel">';
        }
        echo '<div class="menu"><form type="POST"><a href="'.$_SERVER['PHP_SELF'].'"><img src="img/pp_logo.png" height=45px></a><input type="text" name="q" id="q" placeholder="'.$GLOBALS['OVERLAY_SEARCH'].'" value="'.$q.'"> <input type="button" value="'.$GLOBALS['BUTTON_CREATE'].'" onclick="newfile()"/>'.$astring.' '.$infobut.'</form></div><div class="menuspacer"></div>';
    }
    function editor() {
        if (!isset($_REQUEST['edit'])){
            echo '<div class="window normalsize"><div class="title">'.$GLOBALS['BUTTON_CREATE'].'</div><form method="POST"><input type="text" id="title" name="title" placeholder="'.$GLOBALS['OVERLAY_TITLE'].'"><select name="admin" id="admin"><option>0</option><option>1</option></select><br><center><textarea id="content" name="content" maxlength="44444"></textarea></center><input type="submit" value="'.$GLOBALS['BUTTON_SAVE'].'"></form></div>';
        } else {
            echo '<div class="window normalsize"><div class="title">'.$GLOBALS['BUTTON_CREATE'].'</div><form method="POST"><input type="text" id="title" name="title" value="'.getTitleSQL($_REQUEST['edit']).'" placeholder="'.$GLOBALS['OVERLAY_TITLE'].'"><input type="hidden" id="id" name="id" value="'.htmlspecialchars($_REQUEST['edit']).'" ><select name="admin" id="admin"><option>0</option><option>1</option></select><br><center><textarea id="content" name="content" maxlength="44444">'.getContentSQL($_REQUEST['edit']).'</textarea></center><input type="submit" value="'.$GLOBALS['BUTTON_SAVE'].'"></form></div>';
        }
    }
    function window($title,$string) {
        echo '<br><br><br> <div class="window"><div class="title">'.$title.'</div>'.$string.'</div>';
    }
	
	

	
