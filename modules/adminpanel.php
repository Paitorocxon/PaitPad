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
		
		echo '<br><br><br><center><div class="window"><div class="title">Stylesheets</div><form method="POST">Stylesheet:<select onchange="addCSS()" id="selectStyleCSS" name="selectStyleCSS">';
		$files = glob('styles/*.{css,ppcss}', GLOB_BRACE);
		foreach($files as $file) {
			if ($file == $GLOBALS['WEBSITE_STYLESHEET']){
				echo '<option value="'.$file.'" selected>'.$file.'</option>';
			} else {
				echo '<option value="'.$file.'">'.$file.'</option>';
			}
		}
		echo '</select><input type="submit" value="Update"></form></div></center>';


		
		//Successfullllllllll! You are an admin!
		echo '<br><br><br><center><div class="window"><div class="title">User</div><font color="red">You can use * to show EVERY user (Critical! at own risk!)</font><form method="POST"><input type="text" id="username" name="username" placeholder="username"/><input type="submit" value="'.$GLOBALS['OVERLAY_SEARCH'].'"/></form><br></div></center>';
		if (isset($_REQUEST['username'])){
			if ($_REQUEST['username'] == '*'){
				additionadminall();
			} else {
				additionadminsingle();
			}
		}
		if (isset($_REQUEST['selectStyleCSS'])){
				updateStyle(htmlspecialchars($_REQUEST['selectStyleCSS']));
				
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function updateStyle($string) {
		try {
			$content = "";
			$content .=  '<?php'."\n";
			$content .=  '/** '."\n";
			$content .=  '*   '."\n";
			$content .=  '*   @title:     conf'."\n";
			$content .=  '*   @author:    Paitorocxon (Fabian Müller)'."\n";
			$content .=  '*   @created:   31.07.2018'."\n";
			$content .=  '*   @version:   1.0'."\n";
			$content .=  '*   '."\n";
			$content .=  '**/ '."\n";
			$content .=  "\n";
			$content .=  'error_reporting(E_ERROR | E_PARSE);'."\n";
			$content .=  "\n";
			$content .=  '// DATABASE CONFIG'."\n";
			$content .=  '$GLOBALS[\'DATABASE_HOST\'] = \''.$GLOBALS['DATABASE_HOST'].'\';'."\n";
			$content .=  '$GLOBALS[\'DATABASE_NAME\'] = \''.$GLOBALS['DATABASE_NAME'].'\';'."\n";
			$content .=  '$GLOBALS[\'DATABASE_USERNAME\'] =  \''.$GLOBALS['DATABASE_USERNAME'].'\';'."\n";
			$content .=  '$GLOBALS[\'DATABASE_PASSWORD\'] =  \''.$GLOBALS['DATABASE_PASSWORD'].'\';'."\n";
			$content .=  "\n";
			$content .=  '//WEBSITE CONFIG'."\n";
			$content .=  '$GLOBALS[\'WEBSITE_TITLE\'] = \''.$GLOBALS['WEBSITE_TITLE'].'\';'."\n";
			$content .=  '$GLOBALS[\'WEBSITE_LANGUAGE\'] = \''.$GLOBALS['WEBSITE_LANGUAGE'].'\';'."\n";
			$content .=  '$GLOBALS[\'WEBSITE_STYLESHEET\'] = \''.$string.'\';'."\n";
			
			if ($GLOBALS['WEBSITE_PUBLIC'] == false) {
				$content .=  '$GLOBALS[\'WEBSITE_PUBLIC\'] = false;'."\n";
			} else {
				$content .=  '$GLOBALS[\'WEBSITE_PUBLIC\'] = true;'."\n";
			}
			
			$content .=  "\n";
			$content .=  "\n";
			$content .=  '//META CONFIG'."\n";
			$content .=  '$GLOBALS[\'META_AUTHOR\'] = \''.$GLOBALS['META_AUTHOR'].'\';'."\n";
			$content .=  '$GLOBALS[\'META_PUBLISHER\'] = \''.$GLOBALS['META_PUBLISHER'].'\';'."\n";
			$content .=  '$GLOBALS[\'META_COPYRIGHT\'] = \''.$GLOBALS['META_COPYRIGHT'].'\';'."\n";
			$content .=  '$GLOBALS[\'META_DESCRIPTION\'] = \''.$GLOBALS['META_DESCRIPTION'].'\';'."\n";
			$content .=  "\n";
			$content .=  '//WEBCRAWLER'."\n";
			$content .=  '$GLOBALS[\'WEBCRAWLER_REVISITE\'] = \''.$GLOBALS['WEBCRAWLER_REVISITE'].'\';'."\n";
			$content .=  '$GLOBALS[\'WEBCRAWLER_KEYWORDS\'] = \''.$GLOBALS['WEBCRAWLER_KEYWORDS'].'\';'."\n";
			$content .=  "\n";
			$content .=  "\n";
			$content .=  '//SECURITY CONFIG'."\n";
			$content .=  '$GLOBALS[\'SECURITY_ONLYADMINCANDELETE\'] = '.$GLOBALS['SECURITY_ONLYADMINCANDELETE'].';'."\n";

			
			$file = fopen("conf.php","w");
			fwrite($file,$content);
			fclose($file);
			
			}catch (Exception $ex) {
			
			error('error while writing!<br><br><h1>'.$ex.'</h1>');
		}
		return 'Successfully updated stylsheet!';
	}