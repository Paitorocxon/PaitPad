<?php

/*THIS IS THE STANDARD SQL CRAP
    function standardSQL(){
        
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT * FROM paitpad";
       
        foreach ($pdo->query($sql) as $row) {
            echo $row['id']."<br />";
            echo $row['content']."<br />";
            echo $row['date']."<br /><br />";
            
        }
        
    }
*/


    function askSQL($string){//Look for content that contains the $string in it

        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT * FROM paitpad_docs";
        $i = 0;
        foreach ($pdo->query($sql) as $row) {
            $i++;
            if (strpos(strtolower(' '.$row['content']),strtolower(trim($string))) OR strpos(strtolower(' '.$row['title']),strtolower(trim($string))) OR strpos(strtolower(' '.$row['id']),strtolower(trim($string))) OR strpos(strtolower(' '.$row['username']),strtolower(trim($string)))){
                if ($row['admin'] == 1) {
                    if ($_SESSION['admin'] == 1) {
                        echo '<div class="result">';
                        echo '<div class="title"><a href="?id=' . $row['id'].'">['.$row['id'].'] '.$row['title'].'</a></div>';
                        //Trim the string to a length of 200
                        if (strlen($row['content']) > 200){
                            $offset = (200 - 3) - strlen($row['content']);
                            $row['content'] = substr($row['content'], 0, strrpos($row['content'], ' ', $offset)) . '...';
                        }
                        echo $row['content'] .'<br />';
                        echo  $GLOBALS['OVERLAY_DOCUMENT_CREATED'] . $row['date_created'].'<br />';
                        echo  $GLOBALS['OVERLAY_DOCUMENT_EDITED'] . $row['date_edited'].'<br />';
                        echo  '['.$row['username'].']<br /></div>';
                    }
                } else {
                    echo '<div class="result">';
                    echo '<div class="title"><a href="?id=' . $row['id'].'">['.$row['id'].'] '.$row['title'].'</a></div>';
                    //Trim the string to a length of 200
                    if (strlen($row['content']) > 200){
                        $offset = (200 - 3) - strlen($row['content']);
                        $row['content'] = substr($row['content'], 0, strrpos($row['content'], ' ', $offset)) . '...';
                    }
                    echo $row['content'] .'<br />';
                    echo $GLOBALS['OVERLAY_DOCUMENT_CREATED'] . $row['date_created'].'<br />';
                    echo $GLOBALS['OVERLAY_DOCUMENT_EDITED'] . $row['date_edited'].'<br />';
                    echo '['.$row['username'].']<br /></div>';
                }
            }
            
        }
        
    }
    
    function getSQL($id){
        // do yu no da wey bradda?
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT * FROM paitpad_docs where id=".htmlspecialchars($id);
        foreach ($pdo->query($sql) as $row) {
            if ($row['admin'] == 1) {
                if ($_SESSION['admin'] == 1) {
                    echo '<div class="document"><p class="title"><admin>'.$row['title'].'</admin> | <a href="?edit='.$id.'">['.$GLOBALS['BUTTON_EDIT'].']</a></p><br>';
                    echo $row['content'].'<hr class="hr">';
                    echo $GLOBALS['OVERLAY_DOCUMENT_CREATED'] . $row['date_created'].'<br />';
                    echo $GLOBALS['OVERLAY_DOCUMENT_EDITED'] . $row['date_edited'].'<br />';
                    echo '['.$row['username'].']<br /> <a href="?del='.$id.'">'.$GLOBALS['BUTTON_DELETE'].'</a></div>';
                } else {
                    error('0x001');
                }
                
            } else {
                echo '<div class="document"><p class="title">'.$row['title'].' | <a href="?edit='.$id.'">['.$GLOBALS['BUTTON_EDIT'].']</a></p><br>';
                echo $row['content'].'<hr class="hr">';
                echo $GLOBALS['OVERLAY_DOCUMENT_CREATED'] . $row['date_created'].'<br />';
                echo $GLOBALS['OVERLAY_DOCUMENT_EDITED'] . $row['date_edited'].'<br />';
                echo '['.$row['username'].']<br /> <a href="?del='.$id.'">'.$GLOBALS['BUTTON_DELETE'].'</a></div>';
                
            }

        }
        
    }
    
    
    function getContentSQL($id){
        // do yu no da wey bradda?
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT content FROM paitpad_docs where id=".htmlspecialchars($id);
        foreach ($pdo->query($sql) as $row) {
                return $row['content'];
        }
    }
    
    
    function getTitleSQL($id){
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT title FROM paitpad_docs where id=".htmlspecialchars($id);
        foreach ($pdo->query($sql) as $row) {
            return $row['title'];
        }
        
    }
    
    function getAdminSQL($id){
        global $PDO;
        $pdo = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
        $sql = "SELECT admin FROM paitpad_docs where id=".htmlspecialchars($id);
        foreach ($pdo->query($sql) as $row) {
            return $row['admin'];
        }
        
    }
    
    
    
    function putSQL($content,$title,$admin){
        global $PDO;
        
            try {
                $conn = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO paitpad_docs (username,content,title,admin) VALUES ("'.htmlspecialchars($_SESSION['username']).'","'.htmlspecialchars($content).'","'.htmlspecialchars($title).'",'.htmlspecialchars($admin).')';

                $conn->exec($sql);
                return  $GLOBALS['OVERLAY_SAVED'];
            }catch(PDOException $e){
                error('2x001');
                return  $GLOBALS['OVERLAY_ERROR_WHILE_SAVING'];
            }
       
    }
    
    
    function updateSQL($content,$title,$admin,$id){
        global $PDO;
        if (getAdminSQL($id) == 0 OR getAdminSQL($id)== 1 && $_SESSION['admin'] == 1){
            try {
                $conn = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'UPDATE paitpad_docs SET content="'.htmlspecialchars($content).'" SET title="'.htmlspecialchars($title).'" SET admin="'.htmlspecialchars($admin).'" WHERE id='.htmlspecialchars($id).';';

                $conn->exec($sql);
                return  $GLOBALS['OVERLAY_SAVED'];
            }catch(PDOException $e){
                error('2x002');
                return  $GLOBALS['OVERLAY_ERROR_WHILE_SAVING'];
            }
        } else {
            error('0x003');
        }
    }
    
    
    
    function delSQL($id){
        if ($_SESSION['admin'] == 0) {
            if ($GLOBALS['SECURITY_ONLYADMINCANDELETE']) {
                error('0x002');
            }
        } else {
            global $PDO;
            try {
                $conn = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'DELETE FROM paitpad_docs WHERE id="'.htmlspecialchars($id).'"';

                $conn->exec($sql);
                return  $GLOBALS['OVERLAY_DELETED'];
            }catch(PDOException $e){
                error('2x003');
                return  $GLOBALS['OVERLAY_ERROR_WHILE_DELETING'];
            }
        }
    }
    