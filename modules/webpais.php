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
        $string = str_replace('[user]',$_SESSION['username'],$string);
        $string = str_replace('[ip]',$_SESSION['ip'],$string);
        $string = str_replace('[admin]',$_SESSION['admin'],$string);
        
        $string = str_replace('[hr]','<hr>',$string);
        
        
        $string = str_replace('[center]','<center>',$string);
        $string = str_replace('[/center]','</center>',$string);
        $i = 0;
        while ($i <= $count) {
            $string = str_replace('[a]'.get_string_between($string,'[a]','[/a]').'[/a]','<a href="'.get_string_between($string,'[a]','[/a]').'">'.get_string_between($string,'[a]','[/a]').'</a>',$string);
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
    
    