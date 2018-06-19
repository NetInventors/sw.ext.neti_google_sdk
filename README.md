**NOTE**: If you are viewing this on GitHub, please be advised that the repo has been moved to [GitLab](https://gitlab.netinventors.de/shopware/labs/NetiGoogleSdk) and we will no longer respond to Pull Requests on this repo, as it is only a mirror of the GitLab repository.


# Google SDK for Shopware
> Simple wrapper plugin for [Google SDK](https://developers.google.com/api-client-library/php/) to use in multiple plugins.

* PluginKey: NetiGoogleSdk
* ProjectId: [000000-012-512](https://redmine.netinventors.de/projects/000000-012-512/)
* [Plugin in shopware store](http://store.shopware.com/detail/index/sArticle/163326)

## Requirements:
* Shopware version >= 5.2.6

## Install 
We recommend installing the zip package from the [Shopware Community Store](http://store.shopware.com/detail/index/sArticle/163326)

**If you want to checkout from git be sure to name the directory "NetiGoogleSdk" and run `composer install` before using the plugin.**

## How to use / Example
```php
$google = Shopware()->Container()->get('neti_google_sdk.service.sdk_factory')->getClient();
```

## Configuration:
* Just install

## Get involved 
We highly appreciate if you want to add further functions and fix issues. Just fork our plugin and create a pull request.
For more information about contributing to this plugin, please see [CONTRIBUTING.md](CONTRIBUTING.md).

## License & Copyright
Copyright (c) 2017, Net Inventors - Agentur für digitale Medien GmbH

Please see [License file](LICENSE) for more information.

## Contact
**Net Inventors GmbH**  
Stahltwiete 23  
22761 Hamburg  
Germany  

T. 040 42934714-0 // F. 040 42934714-9  
www.netinventors.de // info@netinventors.de 
