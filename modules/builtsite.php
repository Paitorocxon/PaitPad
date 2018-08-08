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
        echo '        <meta name="expires" content="2419-08-01">'."\n";
        echo '        <meta name="revisit-after" content="10 days">'."\n";
        echo '        <meta name="revisit" content="after 10 days">'."\n";
        echo '        <meta name="keywords" content="paitpad pp pait note">'."\n";
        echo '        <link rel="stylesheet" type="text/css" href="'.$GLOBALS['WEBSITE_STYLESHEET'].'">'."\n";
        echo '        <script type="text/javascript">function logout() { window.location.href = "?l=ogout";}</script>';
        echo '        <script type="text/javascript">function refreshtoindex() { window.location.href = "index.php";}</script>';
        echo '        <script type="text/javascript">function newfile() { window.location.href = "?c=reate";}</script>';
        echo '    </HEAD>'."\n";
    }
    function body_start(){
        echo '    <BODY>'."\n";
    }
    function body_end(){
        echo "\n".'    </BODY>'."\n";
    }
    function loginUI(){
        return '<br><br><br> <div class="window"><div class="title">'.$GLOBALS['BUTTON_LOGIN'].'</div><form method="POST"><input type="text" id="username" name="username" placeholder="'.$GLOBALS['OVERLAY_USERNAME'].'"/><br><input type="password" id="password" name="password" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><br><input type="submit" value="'.$GLOBALS['BUTTON_LOGIN'].'"></form></div>            <br><br><br>              <div class="window"><div class="title">'.$GLOBALS['BUTTON_REGISTER'].'</div><form method="POST"><input type="text" id="username" name="username" placeholder="'.$GLOBALS['OVERLAY_USERNAME'].'"/><br><input type="email" name="email" id="email" /> <br><input type="password" id="password" name="password" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><input type="password" id="passwordconf" name="passwordconf" placeholder="'.$GLOBALS['OVERLAY_PASSWORD'].'"/><br><input type="submit" id="sub" name="sub" value="'.$GLOBALS['BUTTON_REGISTER'].'"></form></div>';
    }
    function menubar(){
        $q = '';
        $astring = '';
        if (isset($_REQUEST['q'])) {
            $q = $_REQUEST['q'];
        }
        if (!$GLOBALS['WEBSITE_PUBLIC']) {
            $astring = '<input type="button" value="'.$GLOBALS['BUTTON_LOGOUT'].'"  onclick="logout()">';
        }
        echo '<div class="menu"><form type="POST"><img src="img/pp_logo.png" height=45px><input type="text" name="q" id="q" placeholder="'.$GLOBALS['OVERLAY_SEARCH'].'" value="'.$q.'"><input type="button" value="'.$GLOBALS['BUTTON_CREATE'].'" onclick="newfile()"/>'.$astring.'</form></div><div class="menuspacer"></div>';
    }
    function editor() {
        echo '<div class="window normalsize"><div class="title">'.$GLOBALS['BUTTON_CREATE'].'</div><form method="POST"><input type="text" id="title" name="title" placeholder="'.$GLOBALS['OVERLAY_TITLE'].'"><select name="admin" id="admin"><option>0</option><option>1</option></select><br><center><textarea id="content" name="content"></textarea></center><input type="submit" value="'.$GLOBALS['BUTTON_SAVE'].'"></form></div>';
    }
    function window($title,$string) {
        echo '<br><br><br> <div class="window"><div class="title">'.$title.'</div>'.$string.'</div>';
    }
