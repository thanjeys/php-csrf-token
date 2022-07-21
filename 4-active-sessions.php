<?php
/**
 * Get a List of Active Session
 */
session_start();

echo session_id();


print_r ($_SESSION);

echo "Cookei : ". $_COOKIE["PHPSESSID"];


setcookie("TestCookie", htmlspecialchars('Hellobala'), time()+3600);



defined('MAX_IDLE_TIME') or define('MAX_IDLE_TIME', 3);


class online {
    public static function who() {
        $path = session_save_path();
        if (trim($path)=="") {
            return FALSE;
        }
        $d = dir( $path); $i = 0;
        while (false !== ($entry = $d->read())) {
               
            if ($entry!="." and $entry!="..") {
                if (time()- filemtime($path."/$entry") < MAX_IDLE_TIME * 60) {
                    $i++;
                }
            }
        }
        $d->close();
       
        return $i . "Online";
    }
   
}

print_r(online::who());

