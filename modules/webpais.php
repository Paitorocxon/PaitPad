<?php
/**
*
*   @title:     webpais
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   28.08.2018
*   @version:   1.0
*   
*/





    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }



    function webpaisDec($string){
        $count = str_word_count($string);
        
        $string = str_replace("\n",'<br />',$string);
        $string = str_replace('[b]','<b>',$string);
        $string = str_replace('[/b]','</b>',$string);
        
        $string = str_replace('[i]','<i>',$string);
        $string = str_replace('[/i]','</i>',$string);
        
        $string = str_replace('[h1]','<h1>',$string);
        $string = str_replace('[/h1]','</h1>',$string);
                
        $string = str_replace('[h2]','<h2>',$string);
        $string = str_replace('[/h2]','</h2>',$string);
                
        $string = str_replace('[h3]','<h3>',$string);
        $string = str_replace('[/h3]','</h3>',$string);
                
        $string = str_replace('[h4]','<h4>',$string);
        $string = str_replace('[/h4]','</h4>',$string);
                
        $string = str_replace('[h5]','<h5>',$string);
        $string = str_replace('[/h5]','</h5>',$string);
                
        $string = str_replace('[h6]','<h6>',$string);
        $string = str_replace('[/h6]','</h6>',$string);
        
        $string = str_replace('[img]','<img src="',$string);
        $string = str_replace('[/img]','">',$string);
        
        $string = str_replace('[strike]','<strike>',$string);
        $string = str_replace('[/strike]','</strike>',$string);
        
        $string = str_replace('[font red]','<font color=red>',$string);
        $string = str_replace('[font blue]','<font color=blue>',$string);
        $string = str_replace('[font green]','<font color=green>',$string);
        $string = str_replace('[font yellow]','<font color=yellow>',$string);
        $string = str_replace('[font lime]','<font color=lime>',$string);
        $string = str_replace('[font orange]','<font color=orange>',$string);
        $string = str_replace('[font white]','<font color=white>',$string);
        $string = str_replace('[font black]','<font color=black>',$string);
        $string = str_replace('[/font]','</font>',$string);
        
        $string = str_replace('[break]','<br />',$string);
        
        $string = str_replace('[time]',date('H:i:s A'),$string);
        $string = str_replace('[date]',date('l jS F Y'),$string);
        
        $string = str_replace('[hr]','<hr>',$string);
        
        $string = str_replace('[center]','<center>',$string);
        $string = str_replace('[/center]','</center>',$string);
		
		if (isset($_SESSION)){
			$string = str_replace('[user]',$_SESSION['username'],$string);
			$string = str_replace('[ip]',$_SESSION['ip'],$string);
			$string = str_replace('[admin]',$_SESSION['admin'],$string);
		} else {
			$string = str_replace('[user]','{USERNAME}',$string);
			$string = str_replace('[ip]','{IP FROM USER}',$string);
			$string = str_replace('[admin]','{IS USER ADMIN 1/0}',$string);
		}
        
 	//links
        $i = 0;
        while ($i <= $count) {
            $url = get_string_between($string,'[a=',']');
            $URLtitle = get_string_between($string,'[a='.$url.']','[/a]');
            
            $string = str_replace('[a='.$url.']'.$URLtitle.'[/a]','<a href="'.$url.'">'.htmlspecialchars($URLtitle).'</a>',$string);
            $i++;
        }
        //parallax
        $i = 0;
        while ($i <= $count) {
            $url = get_string_between($string,'[parallax=',']');
            $content = get_string_between($string,'[parallax='.$url.']','[/parallax]');
            
            $string = str_replace('[parallax='.$url.']'.$content.'[/parallax]','<div class="parallax" style="background-image:url(\''.$url.'\');">'.$content.'</div>',$string);
            $i++;
        }
        
        
        return $string;
    }
    function webpaisEnc($string){
        
        $string = str_replace('%time%',date('H:i:s A'),$string);
        $string = str_replace('%date%',date('l jS F Y'),$string);
        $string = str_replace('%user%',$_SESSION['username'],$string);
        $string = str_replace('%ip%',$_SESSION['ip'],$string);
        $string = str_replace('%admin%',$_SESSION['admin'],$string);
        
        return $string;
    }
	
	

    
    