<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    function foldersize($path){
        $sizestr = shell_exec('du -sh "' . $path . '/" | awk \'{print $1} \'');
        return $sizestr;
    }

    function listingsize($path){
        $sizestr = shell_exec('du -h "' . $path . '" | awk \'{print $1}\'');
        return $sizestr;
    }
?>
