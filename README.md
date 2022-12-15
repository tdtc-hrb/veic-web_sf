veic_web with symfony
===
Veic Corporation is web site

```
Copyright (c) 2022 Harbin TDTC Technology Development Co., Ltd.

Apache License Version 2.0
```

# the development environment
1. The language: PHP8.1+
2. IDE: VS Code(Symfony Extension Pack, TWIG pack-Bajdzis)
3. Database: MySQL 5.7+

[![Current Version: v6.2](https://github.com/tdtc-hrb/veic-web_sf/blob/main/docs/sf_version.svg)](https://symfony.com/releases)

## the project structure

your-project/    
├─ assets/    
├─ bin/   
│  └─ console    
├─ config/    
├─ public/    
│  └─ index.php    
├─ src/    
│  └─ ...    
├─ templates/    
├─ migrations/    
├─ translations/    
├─ var/    
│  ├─ cache/    
│  ├─ log/    
│  └─ ...    
├─ vendor/    
└─ .env    
└─ composer.json    
└─ composer.lock    
└─ package.json    
└─ symfony.lock    
└─ webpack.config.js    
└─ yarn.lock



# run

## install yarn
```
npm install --global yarn
```


## setup Symfony CLI

### ps config
enable tls:
```ps
[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12
```

allow script:
```ps
Set-ExecutionPolicy RemoteSigned -scope CurrentUser
```

### install scoop

setup [scoop](https://scoop.sh/):
```ps
iwr -useb get.scoop.sh | iex
```

### install [Symfony CLI](https://symfony.com/download)
```ps
scoop install symfony-cli
```

update:
```ps
scoop update symfony-cli
```



## launch

```bash
cd veic_web_sf
composer update
yarn upgrade
```

### ui(css+js)
```ps
yarn encore dev --watch
```

### web server
install cert:
```ps
symfony server:ca:install
```

start server:
```ps
symfony server:start
```
