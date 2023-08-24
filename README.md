veic_web with symfony
===
Veic Corporation is web site

```
Copyright (c) 2023 Harbin TDTC Technology Development Co., Ltd.

Apache License Version 2.0
```

# the development environment
1. The language: PHP8.1+
2. IDE: VS Code(Symfony Extension Pack, TWIG pack-Bajdzis)
3. Database: MySQL 8.0+

[![Current Version: v6.3](https://github.com/tdtc-hrb/veic-web_sf/blob/main/docs/sf_version.svg)](https://symfony.com/releases)
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
set proxy - Windows:
```bash
set http_proxy='http://<ip:port>'
set https_proxy='http://<ip:port>'
```

## install yarn
```bash
npm install --global yarn
```
using V2:
```bash
yarn set version berry
```

### [cli commands](https://yarnpkg.com/getting-started/migration#cli-commands)
V1:
```
yarn upgrade
```
V2:
```
yarn up
```

## launch
Before upgrading, set the proxy first：
```bash
cd veic-web_sf
composer update
yarn up
```

### ui(css+js)
```bash
yarn encore dev --watch
```

### web server
down [Symfony CLI](https://github.com/symfony-cli/symfony-cli/releases) set path.

install cert:
```bash
symfony server:ca:install
```

start server:
```bash
symfony server:start
```
