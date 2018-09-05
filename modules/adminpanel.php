<?php
/**
*
*   @title:     admin
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   01.08.2018
*   @version:   1.0
*   
*/


    function adminpanel($username){
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT * FROM paitpad_members";
        $avail = 1;
        foreach ($pdo->query($sql) as $row) {
            if (strtolower($row['username']) == strtolower($name)){
                $avail = 0;
            }
        }
        return $avail;
    }