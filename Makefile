###############################################################################
# Tyler Perkins
# 8-3-21
# Makefile/installer

INSTALL_PATH = /var/www/html/

update_config : var/config.php
	cp var/config.php $(INSTALL_PATH)/var/config.php

update_dir :
	cp -r dir $(INSTALL_PATH)

install: var/config.php
	@echo "Installing to $(INSTALL_PATH)"
	@echo "Everything there will be deleted"
	@echo "Do you wish to proceed? (Ctrl+C to cancel)"
	@echo -n "5 "
	@sleep 1
	@echo -n "4 "
	@sleep 1
	@echo -n "3 "
	@sleep 1
	@echo -n "2 "
	@sleep 1
	@echo "1 "
	@sleep 1
	@echo "Cleaning out install path..."
	rm -rf $(INSTALL_PATH)*
	@echo "Moving everything to install directory..."
	cp index.php $(INSTALL_PATH)
	cp listing.php $(INSTALL_PATH)
	cp hiddenlisting.php $(INSTALL_PATH)
	cp -r resources $(INSTALL_PATH)
	cp -r var $(INSTALL_PATH)
	cp -r www $(INSTALL_PATH)
	cp -r dir $(INSTALL_PATH)
	cp -r helpers $(INSTALL_PATH)

var/config.php :
	if [ ! -f var/config.php ]; then cp var/config.def.php var/config.php; fi;
