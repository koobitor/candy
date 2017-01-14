## Setup Composer
```
docker run -tid -p 8000:80 --privileged -e "container=docker" -v /sys/fs/cgroup:/sys/fs/cgroup -v /Users/koobitor/Projects/candy-web:/usr/share/nginx/html --name centos koobitor/centos7:nginx /usr/sbin/init
```

## Command to install extension
```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
php bin/magento setup:static-content:deploy -l en_US
php bin/magento setup:static-content:deploy -l th_TH
php bin/magento setup:static-content:deploy -t Magento/blank -l th_TH
php bin/magento setup:static-content:deploy -t Magento/candy -l th_TH
```

## Routine Command
```
php bin/magento indexer:reindex
php bin/magento cache:clean
php bin/magento cache:clean translate
```

## Development
```
bin/magento deploy:mode:show
php bin/magento deploy:mode:set default
php bin/magento deploy:mode:set developer
php bin/magento deploy:mode:set production
```

# LESS Compile
http://devdocs.magento.com/guides/v2.0/frontend-dev-guide/css-topics/css_debug.html
```
npm install -g grunt-cli
cp package.json.sample package.json
cp Gruntfile.js.sample Gruntfile.js
npm install
npm update
```

# Grunt
```
grunt clean:candy
grunt exec:candy
grunt less:candy
grunt watch
```

## Export
```
php bin/magento app:config:dump # backup config website
php bin/magento i18n:collect-phrases # export lang
php bin/magento i18n:collect-phrases -o "app/design/frontend/Magento/candy/i18n/th_TH.csv" /Applications/MAMP/htdocs/candy-web/
php bin/magento i18n:pack en_US th_TH
```

## frontend
```
php bin/magento setup:static-content:deploy -t Magento/candy -l th_TH
grunt less:candy
```