<?php
    //general config globals

    //This is what will appear in the tab, as well as on the header
    $site_name = 'Tyler\'s File Repository';

    /* Navbar
     *
     * Each variable in $nav_names is what will appear on the top bar
     * These can be set to anything and could be Places on the page, internal pages
     * on the site, or external sites
     *
     * Each varaible in $nav_links is a link that the user will be directed to
     * These can start with "#" to direct to a tag on the page, could be an internal
     * link by using "/listing.php?folder=SomeFolder", or could be an external site
     *
     * $nav_rname and $nav_rlink are for a link on the right side of the nav bar.
     * This link is by default an ad for this repo, however you can disable it by
     * setting $isrNav to false, or change it to advertise anything you choose!
     *
     * The navbar can be disabled by changing isNav to false
     *
     * These associate in order ie the Tag $nav_names[3] will direct the user to
     * the link in $nav_links[3]
     *
     */

    $isNav = true;
    $isrNav = true;

    $nav_names = array(
        'Home',
        'Github',
    );

    $nav_links = array(
        'index.php',
        'https://github.com/Clortox',
    );

    //$nav_rname = 'Git this site!';
    //$nav_rlink = 'https://github.com/Clortox/SimpleFileRepository';


    /* Directory Variables
     * 
     * Each variable in $dir_dirs will be a listing
     * on the main page under "folders"
     * I recomend making a folder of symlinks to where the downloadable files are
     *
     * Each variable in $dir_names will be the title of the listing
     * These will appear on the left hand side and will be the name of the 
     * name of the folder as it appears to the user
     *
     * These assiocate in order ie the folder $dir_dirs[3] will have 
     * the title $dir_names[3]
     */

    $isDir = true;

    $dir_names = array(
        'Printable Guns',
        'GNU Software',
        'Linux Kernel',
        'OS Images',
        'Books and Documents',
    );

    $dir_dirs = array(
        'dir/guns',
        'dir/gnu',
        'dir/linux',
        'dir/iso',
        'dir/books',
    );

    /* Convo
     *
     * These are little tag lines that will appear on the header.
     * A header is randomly chosen each time the page is loaded
     * If you would like to disable this, set isConvo to false
     * If you would like only one line, just comment out/delete all of them except
     * the one you would like to keep.
     *
     * The format is
     * CLIENTIP + [CONVO] + SERVERIP
     *
     * Example:
     * 192.168.1.100 is exchanging goverment secrets with 192.168.1.1
     *
     */

    $isConvo = true;

    $convo = array(
        ' is exchanging goverment secrets with ',
        ' is talking about life with ',
        ' is asking for data via the information superhighway from ',
        ' is baking cookies with ',
        ' is asking for help with their homework from ',
    );

    //Be safe, check arrays
    if(empty($nav_names) or empty($nav_links)){
        $isNav = false;
    } else if(count($nav_names) !== count($nav_links)){
        $isNav = false;
    }

    if(empty($dir_names) or empty($dir_dirs)){
        $isDir = false;
    } else if (count($dir_names) !== count($dir_dirs)){
        $isDir = false;
    }

    if(empty($convo)){
        $isConvo = false;
    }
?>
