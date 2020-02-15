## Setup Composer
```
docker run -tid -p 8000:80 --privileged -e "container=docker" -v /sys/fs/cgroup:/sys/fs/cgroup -v /Users/koobitor/Projects/candy-web:/usr/share/nginx/html --name centos koobitor/centos7:nginx /usr/sbin/init
```

## LESS Compile & Watch
```
grunt clean
php bin/magento setup:di:compile
grunt -vvv exec:candy
grunt less:candy
grunt watch
```

### CMD
```
php -dmemory_limit=5G bin/magento setup:upgrade
php -dmemory_limit=5G bin/magento setup:di:compile
php -dmemory_limit=5G bin/magento setup:static-content:deploy
chown -Rf www-data:www-data *

php -dmemory_limit=5G bin/magento cron:install
php -dmemory_limit=5G bin/magento cron:run
php -dmemory_limit=5G bin/magento cron:run --group index
php -dmemory_limit=5G bin/magento cron:run --group default
grep -r "Report ID: webapi-5e47f4e996cbd" var/
```

## Command to install extension
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento setup:static-content:deploy -l en_US
php bin/magento setup:static-content:deploy -l th_TH
php bin/magento setup:static-content:deploy -t Magento/blank -l th_TH
php bin/magento setup:static-content:deploy -t Magento/candy -l th_TH --no-css
php bin/magento dev:source-theme:deploy
```

## Routine Command
```
php bin/magento indexer:reindex
php bin/magento cache:clean
php bin/magento cache:clean translate
php bin/magento cache:disable
php bin/magento cache:enable
php bin/magento cache:flush
php bin/magento catalog:image:resize
```

## Development
```
php bin/magento deploy:mode:show
php bin/magento deploy:mode:set default
php bin/magento deploy:mode:set developer
php bin/magento deploy:mode:set production
php bin/magento maintenance:disable
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

## Custom Layout
```
layout="1column"
layout="2columns-left"
layout="2columns-right"
layout="3columns"

<referenceBlock name="top.links"></referenceBlock>
<referenceBlock name="head.components"></referenceBlock>
<referenceBlock name="head.additional"></referenceBlock>
<referenceBlock name="page.main.title"></referenceBlock>
<referenceBlock name="footer_links"></referenceBlock>

<referenceContainer name="after.body.start"></referenceContainer>
<referenceContainer name="content"></referenceContainer>
<referenceContainer name="content.aside"></referenceContainer>
<referenceContainer name="columns"></referenceContainer>
<referenceContainer name="columns.top"></referenceContainer>
<referenceContainer name="sidebar.main"></referenceContainer>
<referenceContainer name="footer"></referenceContainer>

# sidebar_main, #sidebar_additional

<!-- social_links -->
<block class="Magento\Cms\Block\Block" name="social_links">
    <arguments>
            <argument name="block_id" xsi:type="string">social_links</argument>
    </arguments>
</block>

<!-- main_menu -->
<block class="Magento\Cms\Block\Block" name="main_menu_en">
    <arguments>
            <argument name="block_id" xsi:type="string">main_menu_en</argument>
    </arguments>
</block>
<block class="Magento\Cms\Block\Block" name="main_menu_th">
    <arguments>
            <argument name="block_id" xsi:type="string">main_menu_th</argument>
    </arguments>
</block>

<referenceBlock name="catalog.compare.sidebar" remove="true"/>
<referenceBlock name="view.addto.compare" remove="true" />
<referenceBlock name="view.addto.wishlist" remove="true" />
<referenceBlock name="wishlist_sidebar" remove="true" />
<referenceBlock name="store.menu" remove="true" />
<referenceBlock name="footer_links" remove="true"/>
```
