Magento2: DisableAdvancedSearch
===

**Q:** How to disable Advanced Search?

> How can I disable advanced search feature in Magento?
>  
>  Even you remove the links from frontend using layouts, if someone who knows Magento URL's accesses **/catalogsearch/advanced** will get the Advanced Search page.

**Source:** https://magento.stackexchange.com/questions/36088/how-to-disable-advanced-search


Installation
===
```
composer require mse-sv3n/disable-advanced-search
bin/magento setup:upgrade
```

Requirements
===
 * PHP7
