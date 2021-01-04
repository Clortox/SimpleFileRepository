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
<body class="bg-dark">
    <?php
	    include 'www/header.php';
    ?>
    <div class="card ml-4 mr-4">
        <div class="card-header">
            <h2>Folders</h2>
        </div>
        <div class="card-body">
            <p>Select a catagory to start browsing</p>
            <table id="catTable" class="display table">
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
</body>
</html>
