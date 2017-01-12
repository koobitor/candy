## Setup Composer
```
docker run -tid -p 8000:80 --privileged -e "container=docker" -v /sys/fs/cgroup:/sys/fs/cgroup -v /Users/koobitor/Projects/candy-web:/usr/share/nginx/html --name centos koobitor/centos7:nginx /usr/sbin/init
```

## Command to install extension
```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Routine Command
```
php bin/magento indexer:reindex
php bin/magento cache:clean
```

## Development
```
bin/magento deploy:mode:show
php bin/magento deploy:mode:set default
php bin/magento deploy:mode:set developer
php bin/magento deploy:mode:set production
```

```
npm install -g grunt-cli
mv package.json.sample package.json
mv Gruntfile.js.sample Gruntfile.js
npm install
npm update
```