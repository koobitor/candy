/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

'use strict';

/**
 * Define Themes
 *
 * area: area, one of (frontend|adminhtml|doc),
 * name: theme name in format Vendor/theme-name,
 * locale: locale,
 * files: [
 * 'css/styles-m',
 * 'css/styles-l'
 * ],
 * dsl: dynamic stylesheet language (less|sass)
 *
 */
module.exports = {
    blank: {
        area: 'frontend',
        name: 'Magento/blank',
        locale: 'en_US',
        files: [
            'css/styles-m',
            'css/styles-l',
            'css/email',
            'css/email-inline'
        ],
        dsl: 'less'
    },
    luma: {
        area: 'frontend',
        name: 'Magento/luma',
        locale: 'en_US',
        files: [
            'css/styles-m',
            'css/styles-l'
        ],
        dsl: 'less'
    },
    candy: {
        area: 'frontend',
        name: 'Magento/candy',
        locale: 'th_TH',
        files: [
            'app/design/frontend/Magento/blank/web/css/styles-m',
            'app/design/frontend/Magento/blank/web/css/styles-l',
            'app/design/frontend/Magento/blank/web/css/email',
            'app/design/frontend/Magento/blank/web/css/email-inline',
            'app/design/frontend/Magento/Candy/web/css/styles-m',
            'app/design/frontend/Magento/Candy/web/css/styles-l',
            'app/design/frontend/Magento/Candy/web/css/email',
            'app/design/frontend/Magento/Candy/web/css/email-inline',
        ],
        dsl: 'less'
    },
    backend: {
        area: 'adminhtml',
        name: 'Magento/backend',
        locale: 'en_US',
        files: [
            'css/styles-old',
            'css/styles'
        ],
        dsl: 'less'
    }
};
