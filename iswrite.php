<?php

if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
} else {
    
echo 'jepp';
}

print_r($_REQUEST);
print_r($_SESSION);
print_r($_COOKIE);
