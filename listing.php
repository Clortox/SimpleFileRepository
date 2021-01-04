<html>
<head>
    <?php
        session_start();
        //if this is a session inside the local connection
        if(strpos($_SERVER['REMOTE_ADDR'],"192.168.1.")){
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(E_ALL);    
        }

        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);    

        //css, js, and other includes
        include 'www/include.php';
        include 'helpers/files.php';
    ?>
    <title><?php echo $site_name ?></title>

</head>
<body style="background-color: black" class="">
    <?php
        include 'www/header.php';
    ?>
    <?php
        $dir = $_GET['folder'];
        $exists = false;
        foreach($dir_names as $dir_index=>$dir_){
            if($dir_ == $dir){
                $exists = true;
                break;
            }
        }

        if(!$exists){
            echo <<< errorblock
                <div class="card-header">
                    <h2><b>LISTING NOT FOUND</b></h2>
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
        if($handle = opendir($dir_dirs[$dir_index] . $path)){
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
                    $fulldir = $dir_dirs[$dir_index] . $path . "/" . $currentfile;
                    if(is_dir($fulldir)){
                        echo "<td><a href=\"listing.php?folder="
                            . $dir . "&path=" . $path . "/" . $currentfile 
                            . "\">View Directory</a></td>"; 
                        echo "<td>" . foldersize($fulldir) . "</td>";
                    } else {
                        echo "<td><a href=\"" . $fulldir . "\">Download</a></td>";
                        echo "<td>" . listingsize($fulldir) . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
