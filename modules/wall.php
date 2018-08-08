<?php

/** 
*   
*   @title:     wall
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   07.08.2018
*   @version:   1.0
*   
**/ 


    function fuckdizfuckers(){
        if (isset($_REQUEST['admin'])) {
            if ($_REQUEST['admin'] < 0 OR $_REQUEST['admin'] > 1 OR !is_numeric($_REQUEST['admin'])) {
                error("1x001");
            }
        }
        if (isset($_REQUEST['del'])) {
            if ($_REQUEST['del'] < 0 OR !is_numeric($_REQUEST['del'])) {
                error("1x002");
            }
        }
    }