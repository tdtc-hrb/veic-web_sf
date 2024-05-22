Begin build on Symfony
====
[Installing & Setting up the Symfony Framework](https://symfony.com/doc/6.4/setup.html)

- PHP    
v8.1+
- Composer    
v2.3.0+
- [Symfony Cli](https://symfony.com/download)
```ps
symfony check:requirements
```

# step by step
PROJECT_DIR:
```
veic-web_sf
```

## step 0: create project
- lts
```bash
composer create-project symfony/skeleton:"^6.4" veic-web_sf
```
- current
```bash
composer create-project symfony/skeleton veic-web_sf
```

## step 1: manage component
enter project directory:
```
cd veic-web_sf
```

install default component:
```bash
composer require webapp
```

### [Front-end Tools: Handling CSS & JavaScript](https://symfony.com/doc/6.4/frontend.html)
选择下面两个的其中一个：    
Choose one of the following two:
- Encore
```
composer require symfony/webpack-encore-bundle
```
Webpack Encore is built with Node.js on top of Webpack.

remove AM:
```
composer remove symfony/asset-mapper
composer remove symfony/stimulus-bundle
composer remove symfony/ux-turbo
```
- AssetMapper    
AssetMapper (recommended for new projects) runs entirely in PHP, 
doesn't require any build step and leverages modern web standards.

### other bundle
- knp-paginator-bundle
default:
```
composer require knplabs/knp-paginator-bundle
```
specific:
```
composer require knplabs/knp-paginator-bundle:6.3.0
```
- maker
```ps
composer require --dev symfony/maker-bundle
```

## step 2: Homepage
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

## step 3: Product
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

## step 4: Company
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


## step 5: About
- Controller
```ps
php bin/console make:controller AboutController
```

- Model
```ps
php bin/console make:entity Qualification
```

## step 6: Article
- Controller
```ps
php bin/console make:controller ArticleController
```

add profile template.
```
profile.html.twig
```

## step 7: Contact
- Controller
```ps
php bin/console make:controller ContactController
```

- Model
```ps
php bin/console make:entity Contact
```

## step 8: Sidebar
- Controller
```ps
php bin/console make:controller PageController
```





# config
更改下面的默认配置

## Routing

### [prefix](https://symfony.com/doc/6.4/routing.html#route-groups-and-prefixes)
- [attribute](https://symfony.com/doc/6.4/routing.html#creating-routes-as-attributes)
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
> config/packages/doctrine.yaml

### [support boolean type](https://stackoverflow.com/questions/9744629/doctrine2-workaround-for-mapping-mysql-bit-data-type)
```
doctrine:
    dbal:
        # ...
        mapping_types:
            bit: boolean
```
