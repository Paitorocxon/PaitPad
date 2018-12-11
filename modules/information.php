<?php
/**
*
*   @title:     information
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   05.08.2018
*   @version:   1.0
*   
*/


    function countSQL(){
        
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT COUNT(id) FROM paitpad_docs";
        $i = 0;
        foreach ($pdo->query($sql) as $row) {
            $row[0];
            
        }
        
    }
    
	
	//Sneaky! Paitpadversion! he he he!
	$GLOBALS['PAITPAD_VERSION'] = '1.1';
    