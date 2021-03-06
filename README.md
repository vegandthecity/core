A custom module for [vegandthecity.ch](https://vegandthecity.ch/shop) (Magento 2).  

## How to install
### Step 1
#### 1.1
```sql
DELETE FROM core_config_data WHERE 'design/head/includes' = path; 
```       
#### 1.2
```posh
rm -f app/design/frontend/tv_themevast_package/home_simple1-bio/web/css/custom-bio.css
rm -f app/design/frontend/tv_themevast_package/home_simple1-bio/web/css/custom.css
rm -f pub/media/custom-bio.css
rm -f pub/media/custom.css
```

### Step 2
```posh             
sudo service cron stop
sudo service nginx stop                
sudo service php7.2-fpm stop
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require vegandthecity/core:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/*
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
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme tv_themevast_package/home_simple1-bio \
	-f de_DE
sudo service php7.2-fpm start
sudo service nginx start
bin/magento maintenance:disable
sudo service cron start 
sudo service varnish restart
```      

## How to upgrade
```posh              
sudo service cron stop
sudo service nginx stop                
sudo service php7.2-fpm stop
bin/magento maintenance:enable
composer remove vegandthecity/core
rm -rf composer.lock
composer clear-cache
composer require vegandthecity/core:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/*
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
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme tv_themevast_package/home_simple1-bio \
	-f de_DE
sudo service php7.2-fpm start
sudo service nginx start
bin/magento maintenance:disable 
sudo service cron start
sudo service varnish restart
```