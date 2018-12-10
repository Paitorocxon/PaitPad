<?php
/**
*
*   @title:     info
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   28.08.2018
*   @version:   1.0
*   
*/


    function versionCheck(){
        echo '<h1 class="innerin">'.$GLOBALS['WEBSITE_TITLE'].'</h1>'."\n";
        echo '<table style="width:100%">'."\n";
        echo '    <tr>'."\n";
        echo '        <td>PaitPad Version</td>'."\n";
        echo '        <td>'.$GLOBALS['PAITPAD_VERSION'].'</td>'."\n";
		if (file_get_contents('https://raw.githubusercontent.com/Paitorocxon/PaitPad/master/versioncode.vr') > $GLOBALS['PAITPAD_VERSION']) {
			echo '        <td>Your PaitPad version (<font color=red>Outdated!</font>)</td>'."\n";
		} else {
			echo '        <td>Your PaitPad version (<font color=lime>Up to date!</font>)</td>'."\n";
		}		
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>PHP_SELF</td>'."\n";
        echo '        <td>'.$_SERVER['PHP_SELF'].'</td>'."\n";
        echo '        <td>Path to paitpad\'s index.php</td>'."\n";
        echo '    </tr>'."\n";
		echo '    <tr>'."\n";
        echo '        <td>PHP-Version</td>'."\n";
        echo '        <td>'.phpversion().'</td>'."\n";
        echo '        <td>Your PHP version</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>PHP_SELF</td>'."\n";
        echo '        <td>'.$_SERVER['PHP_SELF'].'</td>'."\n";
        echo '        <td>Path to paitpad\'s index.php</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SERVER_SOFTWARE</td>'."\n";
        echo '        <td>'.$_SERVER['SERVER_SOFTWARE'].'</td>'."\n";
        echo '        <td>Paht to paitpad\'s index.php</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>GATEWAY_INTERFACE</td>'."\n";
        echo '        <td>'.$_SERVER['GATEWAY_INTERFACE'].'</td>'."\n";
        echo '        <td>Used gateway interface (e.g CGI/1.1)</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SERVER_ADDR</td>'."\n";
        echo '        <td>'.$_SERVER['SERVER_ADDR'].'</td>'."\n";
        echo '        <td>Address of the server</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SERVER_NAME</td>'."\n";
        echo '        <td>'.$_SERVER['SERVER_NAME'].'</td>'."\n";
        echo '        <td>Name of the server</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SERVER_PROTOCOL</td>'."\n";
        echo '        <td>'.$_SERVER['SERVER_PROTOCOL'].'</td>'."\n";
        echo '        <td>Server protocol</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>DOCUMENT_ROOT</td>'."\n";
        echo '        <td>'.$_SERVER['DOCUMENT_ROOT'].'</td>'."\n";
        echo '        <td>Path to the root documents on your server</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>HTTP_ACCEPT</td>'."\n";
        echo '        <td>'.$_SERVER['HTTP_ACCEPT'].'</td>'."\n";
        echo '        <td>Contents of the Accept: header from the current request, if there is one</td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SCRIPT_FILENAME</td>'."\n";
        echo '        <td>'.$_SERVER['SCRIPT_FILENAME'].'</td>'."\n";
        echo '        <td>The absolute pathname of the currently executing script. </td>'."\n";
        echo '    </tr>'."\n";
        echo '    <tr>'."\n";
        echo '        <td>SERVER_ADMIN</td>'."\n";
        echo '        <td>'.$_SERVER['SERVER_ADMIN'].'</td>'."\n";
        echo '        <td>The value given to the SERVER_ADMIN (for Apache) directive in the web server configuration file. If the script is running on a virtual host, this will be the value defined for that virtual host. </td>'."\n";
        echo '    </tr>'."\n";
        echo '</table>';
    }
    
    