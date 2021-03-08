<html>
<head>
    <?php
        session_start();

        //css, js, and other includes
        include 'www/include.php';
        include 'helpers/files.php';

        //if debug is enabled
        if($isDebug){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }

    ?>
    <title><?php echo $site_name ?></title>
    <link rel="icon" href"<?php echo $site_image ?>">

</head>
<body style="background-color: black" class="">
    <?php
        include 'www/header.php';
    ?>
    <?php
        $dir = $_GET['folder'];
        $exists = false;
        foreach($hid_dir_names as $hid_dir_index=>$dir_){
            if($dir_ == $dir){
                $exists = true;
                break;
            }
        }

        $psk = $_GET['psk'];
        $psk_correct = false;
        if($hid_dir_psk[$hid_dir_index] == $psk){
            $psk_correct = true;
        }

        if(!$exists || !$psk_correct){
            echo <<< errorblock
                <div class="card-header">
                    <h2><b>INCORRECT FOLDER OR PASSKEY, PLEASE CONTACT THE SYSTEM ADMINISTRATOR</b></h2>
                </div>
            errorblock;
            exit();
        }

        if(!array_key_exists('path', $_GET)){
            $path = '/';
        } else {
            $path = $_GET['path'];
        }

        $elements = [];
        if($handle = opendir($hid_dir_dirs[$hid_dir_index] . $path)){
            while(false !== ($entry = readdir($handle))){
                //exclude . and ..
                if($entry != '.' && $entry != '..'){
                    $elements[] = $entry;
                }
            }
        } else {
            echo <<< erroropendir
                <div class="card-header">
                    <h2><b>ERROR OPENING DIRECTORY, PLEASE RELOAD THE PAGE</b></h2>
                    <h2><b>IF THE ISSUE PERSISTS, PLEASE CONTACT YOUR SYSTEM ADMINISTRATOR</b></h2>
                </div>
            erroropendir;
            exit();
        }

    ?>
    <div class="card bg-dark text-white ml-4 mr-4">
        <div class="card-header">
            <h2><?php echo $dir ?></h2>
        </div>
        <div class="card-body">
            <p>Select a file to download, or a folder to view its contents</p>
            <table id="catTable" class="display table text-white">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Link</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                if(count($elements) == 0){
                    echo <<< emptylisting
                        <tr>
                            <td>Oops! This folder is empty...</td>
                            <td></td>
                            <td>0</td>
                        </tr>
                    emptylisting;
                }
                foreach($elements as $i=>$currentfile){
                    echo "<tr>";
                    echo "<td>" . $currentfile . "</td>";
                    $fulldir = $hid_dir_dirs[$hid_dir_index] . $path . "/" . $currentfile;
                    if(is_dir($fulldir)){
                        echo "<td><a href=\"hiddenlisting.php?folder=" . $dir
                            . "&psk=" . $psk
                            . "&path=" . $path . "/" . $currentfile
                            . "\">View Directory</a></td>";
                        echo "<td>" . foldersize($fulldir) . "</td>";
                    } else {
                        echo "<td><a href=\"" . $fulldir . "\">Download</a></td>";
                        echo "<td>" . listingsize($fulldir) . "</td>";
                    }
                    echo "<tr>";
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
