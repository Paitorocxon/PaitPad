<?php

/** 
*   
*   @title:     error
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   08.08.2018
*   @version:   1.0
*   
**/ 


    function error($string) {
        $allReqs = 'REQUESTS:';
        foreach ($_REQUEST as $reqName => $reqValue) {
           $allReqs .= '['.$reqName.'='.$reqValue.'] '; 
        }
        
        
        $errorlog = 'logs/'.date("Y-m-d").'.log';
        if (file_exists($errorlog)) {
            $errorcontent = file_get_contents($errorlog);
            $errorhandle = fopen($errorlog, 'w') or die('uhm... the error handler has... an error? What da heck? chmod 777 -R to the paitpad folder?');
            $data = $errorcontent . "\n" . "\n" . 'X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X=X' .  "\n" . "\n" . $string . ' dropped by ' . $_SESSION['username'] . '('.$_SESSION['ip'].') @ ' . date("Y-m-d h:i:sa") . "\n" . '===============' . "\n" . $allReqs . "\n" . '===============';
            fwrite($errorhandle, $data);
        } else {
            $errorhandle = fopen($errorlog, 'w') or die('Error while creating the... uhm error file o.O! (' . $errorlog . ') What da heck? chmod 777 -R to the paitpad folder?');
            $data = $string . ' dropped by ' . $_SESSION['username'] . '('.$_SESSION['ip'].') @ ' . date("Y-m-d h:i:sa") . "\n" . '===============' . "\n" . $allReqs . "\n" . '===============';
            fwrite($errorhandle, $data);
        }

        window('<b>ERROR!</b>','<a href="errorcatalog.php?error='.$string.'">Error: '.$string.'</a><br><font color=#F00>'.$GLOBALS['WEBSITE_ERRORFACE'].'</font>');
    }