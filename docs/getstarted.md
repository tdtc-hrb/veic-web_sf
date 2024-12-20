Begin build on Symfony
====
[Installing & Setting up the Symfony Framework](https://symfony.com/doc/6.4/setup.html)

# Prepare
- Composer
- Php Modules

## Composer
add repository:
```
sudo add-apt-repository ppa:ondrej/php # Press enter when prompted.
sudo apt update
```
### [Installing composer in Linux](https://www.transip.eu/knowledgebase/entry/3300-installing-composer-in-linux/)
In addition to the basics that come with installing PHP, 
Composer requires php-cli php-zip wget and unip.    
You install these as follows (often they will be installed already if you've installed PHP):
```
sudo apt -y install php-cli php-zip wget unzip
```
Download the composer installer with the command:
```
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
```
Finally, install Composer in the /usr/local/bin directory (so it is available to all users) with the command:
```
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```
After installation, you can remove the installer with the command:
```
sudo rm composer-setup.php
```

### specific php version
see versions:
```
sudo update-alternatives --config php
```
specifically choose the [PHP version](https://askubuntu.com/questions/1373755/how-to-change-php-version-in-ubuntu-20-04-console):
```
sudo update-alternatives --set php /usr/bin/php8.3
```

## Php modules
- Symfony cli
- xml
- pdo

[list](https://computingforgeeks.com/how-to-install-php-8-2-on-ubuntu/):
```
php -m
```

### [Symfony CLI](https://symfony.com/download)
```
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash

sudo apt install symfony-cli
```
- checker
```
symfony check:requirements
```

### php-xml
Q: symfony/framework-bundle[v6.4.0, ..., v6.4.8] require ext-xml * -> it is missing from your system. Install or enable PHP's xml extension

A: [How To Install php-xml on Ubuntu 22.04](https://installati.one/install-php-xml-ubuntu-22-04/)
```
sudo apt -y install php-xml
```

### pdo
- mysql
```
sudo apt install php8.3-pdo-mysql
```
- pgsql
```
sudo apt install php8.3-pdo-pgsql
```

### [more lib](https://php.watch/articles/install-php82-ubuntu-debian)
```
sudo apt install php-{mbstring,intl}
```


# step by step
create:
```bash
composer create-project symfony/skeleton:"^6.4" veic-web_sf
```

## step 1: manage component
webapp:
```bash
cd veic-web_sf
composer require webapp
```

### [Front-end Tools: Handling CSS & JavaScript](https://symfony.com/doc/6.4/frontend.html)
- Asset Mapper
> 推荐在v8.4版本后，使用 AssetMapper
remove:
```
composer remove symfony/ux-turbo
composer remove symfony/stimulus-bundle
composer remove composer/semver
composer remove symfony/asset-mapper
```

- Encore
```
composer require symfony/webpack-encore-bundle
```
Webpack Encore is built with Node.js on top of Webpack.


### other bundle
- knp-paginator-bundle
> specific
```
composer require knplabs/knp-paginator-bundle:6.6.1
```
- update maker
```ps
composer require --dev symfony/maker-bundle
```

## step 2: manage project
- Homepage
- Product
- Company
- About
- Article
- Contact
- Sidebar

### Homepage
- Controller
```ps
php bin/console make:controller HomeController
```
- Model
```ps
php bin/console make:entity Navigation
```

```ps
php bin/console make:entity Glossary
```

### Product
- Controller
```ps
php bin/console make:controller ProductController
```

- Model
```ps
php bin/console make:entity Language
```

```ps
php bin/console make:entity Product
```

```ps
php bin/console make:entity Parameter
```

```ps
php bin/console make:entity Statu
```

```ps
php bin/console make:entity Image
```

### Company
- Controller
```ps
php bin/console make:controller CompanyController
```

- Model
```ps
php bin/console make:entity Article
```

```ps
php bin/console make:entity Type
```


### About
- Controller
```ps
php bin/console make:controller AboutController
```

- Model
```ps
php bin/console make:entity Qualification
```

### Article
- Controller
```ps
php bin/console make:controller ArticleController
```

add profile template.
```
profile.html.twig
```

### Contact
- Controller
```ps
php bin/console make:controller ContactController
```

- Model
```ps
php bin/console make:entity Contact
```

### Sidebar
- Controller
```ps
php bin/console make:controller PageController
```


## step 3: config project
更改下面的默认配置

## Routing
- [attribute](https://symfony.com/doc/6.4/routing.html#creating-routes-as-attributes)
### [prefix](https://symfony.com/doc/6.4/routing.html#route-groups-and-prefixes)
> routes/attributes.yaml
```xml
controllers:
    resource: ../../src/Controller/
    type: attribute
    prefix:
        ja: '/ja-jp'
        en: '/en-us'
        zh: '/zh-cn'
```

## [doctrine](https://symfony.com/doc/6.4/doctrine.html)
- [support boolean type](https://stackoverflow.com/questions/9744629/doctrine2-workaround-for-mapping-mysql-bit-data-type)    
config/packages/doctrine.yaml:
```
doctrine:
    dbal:
        # ...
        mapping_types:
            bit: boolean
```
