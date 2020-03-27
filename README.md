A custom module for [vegandthecity.ch](https://vegandthecity.ch/shop) (Magento 2).  

## How to install
```             
sudo service crond stop
sudo service nginx stop                
sudo service php-fpm stop
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require vegandthecity/core:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US de_DE de_CH
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme tv_themevast_package/home_simple1 \
	-f de_CH
sudo service php-fpm start
sudo service nginx start
bin/magento maintenance:disable
sudo service crond start
```

## How to upgrade
```              
sudo service crond stop
sudo service nginx stop                
sudo service php-fpm stop
bin/magento maintenance:enable
composer remove vegandthecity/core
rm -rf composer.lock
composer clear-cache
composer require vegandthecity/core:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US de_DE de_CH
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme tv_themevast_package/home_simple1 \
	-f de_CH
sudo service php-fpm start
sudo service nginx start
bin/magento maintenance:disable 
sudo service crond start
```