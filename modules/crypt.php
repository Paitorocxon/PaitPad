<?php
/**
*
*   @title:     crypt
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   01.08.2018
*   @version:   1.0
*   
*/

/**
* ATTENTION! CHANGING THE SALT WHEN IT WAS USED ONCE WILL DESTROY THE WHOLE USERDATA!
* EVERY PASSWORD WILL BE UNUSABLE! IT CAN HARM A TOTAL DESTRUCTION!
* BE CAREFULL!
* 
**/
//STANDARD SALT IS '0'
/** THIS IS THE SALT! CAREFUL! SAVE IT SOMEWHERE! BE CAREFULL! I CAN NOT WARN YOU ENOUGH! **/ $GLOBALS['salt'] = 0;

/**
* ATTENTION! CHANGING THE SALT WHEN IT WAS USED ONCE WILL DESTROY THE WHOLE USERDATA!
* EVERY PASSWORD WILL BE UNUSABLE! IT CAN HARM A TOTAL DESTRUCTION!
* BE CAREFULL!
* 
**/
    
    
  #Functions  
    

    function/**/ paitCryption($string){/**/$i/**/=/**/0;/**/$strings/**/=/**/str_split($string);/**/$string/**/=/**/NULL;/**/foreach/**/($strings/**/as/**/$char)/**/{/**/$string/**/.=/**/ord($char);/**/$i++;/**/}/**/$strings/**/=/**/str_split($string);/**/$string/**/=/**/NULL;/**/foreach/**/($strings/**/as/**/$char)/**/{/**/$string/**/.=/**/ord($char);$i++;/**/}/**//**/$strings/**/=/**/str_split($string);/**/$string/**/=/**/NULL;/**/foreach/**/($strings/**/as/**/$char)/**/{/**/$string/**/.=/**/$char*$i+$GLOBALS['salt'];$i++;/**/}/**/$strings/**/=/**/str_split($string);/**/$string/**/=/**/NULL;/**/foreach/**/($strings/**/as/**/$char)/**/{/**/$string/**/.=/**/chr($char+65);$i++;/**/}
        return $string;
    }

//When i wrote this lines of code it was f*cking 35°c/95°f in Berlin