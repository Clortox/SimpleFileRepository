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
    <link rel="icon" href="<?php echo $site_image ?>">

</head>
<body style="background-color: black">
    <?php
	    include 'www/header.php';
    ?>
    <div class="card bg-dark text-white ml-4 mr-4">
        <div class="card-header">
            <h2>Folders</h2>
        </div>
        <div class="card-body">
            <?php
                if(!$isDir){
                    echo <<< errorblock
                        <h2><b>THERE ARE NO TRACKED DIRECTORIES, 
                            OR THERE IS AN ERROR IN YOU CONFIGURATION. 
                            PLEASE CHECK 'var/config'</b></h2>
                    errorblock;
                    exit();
                }
            ?>
            <p>Select a category to start browsing</p>
            <table id="catTable" class="display table text-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach($dir_names as $i=>$currentdir){
                    echo '<tr>';
                    echo '<td>' . $currentdir . '</td>';
                    echo '<td><a href="listing.php?folder=' . $dir_names[$i] .'">View Listing</a></td>';
                    echo '<td>' . foldersize($dir_dirs[$i])  . '</td>';
                    echo '</tr>';
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        if($isTree){
            echo <<< cardHead
            <div class="card bg-dark text-white ml-4 mr-4">
            <div class="card-header">
            cardHead;
            echo '<h2>' . $treeName . '</h2>';
            echo <<< tableandcard
            </div>
            <div class="card-body">
            <table id="treeTable" class="display table text-white">
                <thead>
                    <tr>
                        <th>Link</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tbody>
            tableandcard;
            foreach($tree_names as $i=>$currentLink){
                echo '<tr>';
                echo '<td><a href="' . $tree_links[$i] . '">' 
                    . $currentLink . '</a></td>';
                echo '<td>' . $tree_links[$i] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</body>

</html>
