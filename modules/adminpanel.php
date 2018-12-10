<?php
/**
*
*   @title:     admin
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   01.08.2018
*   @version:   1.0
*   
*/


    function administration(){
		
		if ($_SESSION['admin'] != 1){
			error('0x004');
		}
		


		
		//Successfullllllllll! You are an admin!
		echo '<br><br><br><center><div class="window"><div class="title">Adminpanel</div><font color="red">You can use * to show EVERY user (Critical! at own risk!)</font><form method="POST"><input type="text" id="username" name="username" placeholder="username"/><input type="submit" value="'.$GLOBALS['OVERLAY_SEARCH'].'"/></form><br></div></center>';
		if (isset($_REQUEST['username'])){
			if ($_REQUEST['username'] == '*'){
				additionadminall();
			} else {
				additionadminsingle();
			}
		}
		
		
		
		
    }
	
	function additionadminall(){
		
			global $PDO;
            $pdo = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
            $sql = "SELECT id,username,password,admin,actions,ip,email,passwordreset FROM paitpad_members";
            foreach ($pdo->query($sql) as $row) {

				echo '<br><center><div class="document">';
				echo '<form method="POST">';
			
				echo '<div class="title">'.$GLOBALS['WEBSITE_TITLE'].' -Adminpanel</div>'."\n";
				echo '<table style="width:100%">'."\n";
				echo '    <tr>'."\n";
				echo '        <td>id</td>'."\n";
				echo '        <td>'.$row['id'].'</td>'."\n";
				echo '        <td>Identification Number</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Username</td>'."\n";
				echo '        <td>'.$row['username'].'</td>'."\n";
				echo '        <td>Username</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Admin</td>'."\n";
				echo '        <td>';
				
				echo '<label><select name="willBeAdmin">';
				if ($row['admin'] == 1){
					echo '<option value="1" selected>Admin</option>';
					echo '<option value="0">No Admin</option>';
				} else {
					echo '<option value="1">Admin</option>';
					echo '<option value="0" selected>No Admin</option>';
				}
				echo '</select></label>';
				
				echo '</td>'."\n";
				echo '        <td>User permissions</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Require password reset</td>'."\n";
				echo '        <td>';
				
							
				echo '<label><select name="willBePasswortreset">';
				if ($row['passwordreset'] == 1){
					echo '<option value="1" selected>Require passwordreset</option>';
					echo '<option value="0">Does not require passwordreset</option>';
				} else {
					echo '<option value="1">Require passwordreset</option>';
					echo '<option value="0" selected>Does not require passwordreset</option>';
				}
				echo '</select></label>';
				
				echo '</td>'."\n";
				echo '        <td>Force user to change his/her password</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Email address</td>'."\n";
				echo '        <td><input type="text" placeholder="email" id="newemail" name="newemail" value="'.$row['email'].'"></td>'."\n";
				echo '        <td>Users email</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Registred IP</td>'."\n";
				echo '        <td>'.$row['ip'].'</td>'."\n";
				echo '        <td>IP from user (while registration)</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Total actions</td>'."\n";
				echo '        <td>'.$row['actions'].'</td>'."\n";
				echo '        <td>Total count of actions the user has made</td>'."\n";
				echo '    </tr>'."\n";
				
				echo '</table>';


				//Select if user is Admin
				echo '<input type="hidden" name="id" id="id" hint="DO NOT CHANGE THIS!" value="'.$row['id'].'"/>';
				echo '<input type="hidden" name="ccc" id="ccc" hint="DO NOT CHANGE THIS!" value="adminaction"/>';
	
				//Change informations
				echo '<input type="submit" value="update">';
				
	

				
				
				echo '</form>';
				
				echo '</div></center>';
            }
	}
	
	
	
	function additionadminsingle(){
		
			global $PDO;
            $pdo = new PDO(comparedIdentitys(), $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
            $sql = "SELECT id,password,admin,actions,ip,email,passwordreset FROM paitpad_members where username like'".htmlspecialchars($_REQUEST['username'])."'";
            foreach ($pdo->query($sql) as $row) {

				echo '<br><center><div class="document">';
				echo '<form method="POST">';
			
				echo '<div class="title">'.$GLOBALS['WEBSITE_TITLE'].' -Adminpanel</div>'."\n";
				echo '<table style="width:100%">'."\n";
				echo '    <tr>'."\n";
				echo '        <td>id</td>'."\n";
				echo '        <td>'.$row['id'].'</td>'."\n";
				echo '        <td>Identification Number</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Username</td>'."\n";
				echo '        <td>'.$_REQUEST['username'].'</td>'."\n";
				echo '        <td>Username</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Admin</td>'."\n";
				echo '        <td>';
				
				echo '<label><select name="willBeAdmin">';
				if ($row['admin'] == 1){
					echo '<option value="1" selected>Admin</option>';
					echo '<option value="0">No Admin</option>';
				} else {
					echo '<option value="1">Admin</option>';
					echo '<option value="0" selected>No Admin</option>';
				}
				echo '</select></label>';
				
				echo '</td>'."\n";
				echo '        <td>User permissions</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Require password reset</td>'."\n";
				echo '        <td>';
				
							
				echo '<label><select name="willBePasswortreset">';
				if ($row['passwordreset'] == 1){
					echo '<option value="1" selected>Require passwordreset</option>';
					echo '<option value="0">Does not require passwordreset</option>';
				} else {
					echo '<option value="1">Require passwordreset</option>';
					echo '<option value="0" selected>Does not require passwordreset</option>';
				}
				echo '</select></label>';
				
				echo '</td>'."\n";
				echo '        <td>Force user to change his/her password</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Email address</td>'."\n";
				echo '        <td><input type="text" placeholder="email" id="newemail" name="newemail" value="'.$row['email'].'"></td>'."\n";
				echo '        <td>Users email</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Registred IP</td>'."\n";
				echo '        <td>'.$row['ip'].'</td>'."\n";
				echo '        <td>IP from user (while registration)</td>'."\n";
				echo '    </tr>'."\n";
				echo '    <tr>'."\n";
				echo '        <td>Total actions</td>'."\n";
				echo '        <td>'.$row['actions'].'</td>'."\n";
				echo '        <td>Total count of actions the user has made</td>'."\n";
				echo '    </tr>'."\n";
				
				echo '</table>';


				//Select if user is Admin
				echo '<input type="hidden" name="id" id="id" hint="DO NOT CHANGE THIS!" value="'.$row['id'].'"/>';
				echo '<input type="hidden" name="ccc" id="ccc" hint="DO NOT CHANGE THIS!" value="adminaction"/>';
	
				//Change informations
				echo '<input type="submit" value="update">';
				
	

				
				
				echo '</form>';
				
				echo '</div></center>';
            }
	}
	
	function upgradeUser($id,$email,$pwreset,$admin){

        global $PDO;
            try {
                $conn = new PDO('mysql:host='.$GLOBALS['DATABASE_HOST'].';dbname='.$GLOBALS['DATABASE_NAME'], $GLOBALS['DATABASE_USERNAME'], $GLOBALS['DATABASE_PASSWORD']);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'UPDATE paitpad_members SET admin=\''.htmlspecialchars(($admin)).'\', email=\''.htmlspecialchars(($email)).'\', passwordreset=\''.htmlspecialchars(($pwreset)).'\'  WHERE id=\''.htmlspecialchars($id).'\';';

                $conn->exec($sql);
                return  $GLOBALS['OVERLAY_SAVED'];
            }catch(PDOException $e){
                error('2x002');
                return  $GLOBALS['OVERLAY_ERROR_WHILE_SAVING'];
            }
 
    }