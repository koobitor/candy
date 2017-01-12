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
```