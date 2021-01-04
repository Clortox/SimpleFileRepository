<?php
    $clientip = $_SERVER['REMOTE_ADDR'];
    $serverip = $_SERVER['SERVER_ADDR'];

?>

<header>
    <div class="jumbotron bg-dark border-bottom border-secondary text-white">
    <h1><?php echo $site_name ?></h1>
    <?php
        if($isConvo){
            $saying = $convo[rand(0,count($convo)-1)];
            echo '<p>' . $clientip . $saying . $serverip . '</p>';
        }
    ?>

        <nav class="navbar navbar-expand-lg navbar-dark border border-secondary">
            <?php
                foreach($nav_names as $index=>$name){
                    echo '<a class="navbar-brand" href="' . $nav_links[$index] . '">'
                        . $name . '</a>';
                }
            ?>
        </nav>


    </div>
</header>
