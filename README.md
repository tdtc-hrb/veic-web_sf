veic_web with symfony
===
Veic Corporation is web site

```
Copyright (c) 2023 Harbin TDTC Technology Development Co., Ltd.

Apache License Version 2.0
```

# the development environment
1. The language: PHP8.2+
2. IDE: VS Code(Symfony Extension Pack, TWIG pack-Bajdzis)
3. Database: MySQL 8.0+

[![Current Version: v6.2](https://github.com/tdtc-hrb/veic-web_sf/blob/main/docs/sf_version.svg)](https://symfony.com/releases)
- v6.4(LTS)    
Dec 1, 2023

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
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
```

### install scoop

setup [scoop](https://scoop.sh/):
```ps
irm get.scoop.sh -Proxy 'http://<ip:port>' | iex
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
yarn upgrade --network-timeout 30000000
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
