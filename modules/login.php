<?php
/**
*
*   @title:     login
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   01.08.2018
*   @version:   1.0
*   
*/



    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

	function comparedIdentitys(){
		return 'mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'];
	}
		
	

    function login() {
        
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            global $PDO;
            $pdo = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
            $sql = "SELECT password FROM paitpad_members where username like'".$_SESSION['username']."'";
            foreach ($pdo->query($sql) as $row) {
                if (trim(paitCryption($_SESSION['password'])) == $row['password']){
                    return 1;
                } else {
                    return 0;
                }                
            }
        } elseif (isset($_REQUEST['username']) && isset($_REQUEST['password']) AND !isset($_REQUEST['passwordconf']) && !isset($_REQUEST['email'])) {
            global $PDO;
            $pdo = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
            $sql = "SELECT id,password,admin,actions,ip,email,passwordreset FROM paitpad_members where username like'".htmlspecialchars($_REQUEST['username'])."'";
            foreach ($pdo->query($sql) as $row) {
 
            if (trim(paitCryption(trim(htmlspecialchars($_REQUEST['password'])))) == $row['password']){
                    $_SESSION['username'] = $_REQUEST['username'];
                    $_SESSION['password'] = $_REQUEST['password'];
                    $_SESSION['admin'] = $row['admin'];
                    $_SESSION['actions'] = $row['actions'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['ip'] = getUserIP();
                    $_SESSION['passwordreset'] = $row['passwordreset'];
                    $_SESSION['email'] = $row['email'];
                    return 1;
                } else {
                    return 0;
                }                
            }
        } else {
            return 0;
        }
    }
    
    
    
        function register() {
        
        if ($_REQUEST['password'] == $_REQUEST['passwordconf']) {
            global $PDO;
            $pdo = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
            $sql = 'select  username from paitpad_members where username like "'.$_REQUEST['username'].'%"';
            foreach ($pdo->query($sql) as $row) {
                if (isset($row['username'])) {
                    //header('Refresh:0; url=index.php?message=username not available');
                    echo '<meta http-equiv="refresh" content="0; url="index.php?message=username not available" />';  
                }
            }
            try {
                $conn = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO paitpad_members (username,email,passwordreset,password,ip,admin,actions) VALUES ("'.htmlspecialchars($_REQUEST['username']).'","'.htmlspecialchars($_REQUEST['email']).'",0,"'.paitCryption(htmlspecialchars($_REQUEST['password'])).'","'.getUserIP().'",0,0)';
                $conn->exec($sql);
                echo  $GLOBALS['OVERLAY_SAVED'];
                //header('Refresh:0; url=index.php');
                echo '<meta http-equiv="refresh" content="0; url="index.php" />';
            }catch(PDOException $e){              
                echo '<meta http-equiv="refresh" content="0; url="index.php?message='.$GLOBALS['OVERLAY_ERROR_WHILE_SAVING'].'" />';  
                //header('Refresh:0; url=index.php?message=' . );
            }
        } else {
            error('Incomplete!');
        }
    }
    
    
    
    function logout(){
        session_destroy();
    }
    
    