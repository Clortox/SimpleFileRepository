Simple Repository
=================

My simple php file repository/link tree that I wrote for my personal NAS.

Requirements
------------

To run this you will need:

apache2
php
make

How to use
----------

All setup can be done with make. It is recomended you first edit the config file. Above each section is an explanation of how to use it. To create a new config file, run:

```bash
make new_config
```

The config file can then be found at [var/config.php](var/config.php)

After you are done setting up your configuration file, run:

```bash
make install
```

This will install the website and should now be accessible. If at any time you wish to update the config file, edit the config file in this folder, then run:

```bash
make update_config
```

If you would like to update the dir folder with new symlinks that you have added, you can do so automatically by running:
```bash
make update_dir
```
