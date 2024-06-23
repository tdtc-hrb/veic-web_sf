UI
====
- Installation
- disables the Symfony UX Stimulus bridge
- Enabled Sass
- usage jquery

## Installation
> 如果没有 [yarn.lock](https://github.com/yarnpkg/berry/issues/2212) 文件, 
>> 在工程根目录新建一个.

- sass    
管理 JQuery && Bootstrap

- webpack
```
yarn add webpack --dev
```
SF v6.2以上是升级.

### Sass
```
yarn add sass --dev
yarn add sass-loader
```

### JQuery && Bootstrap
```bash
yarn add jquery --dev
yarn add @types/express --dev
yarn add @popperjs/core --dev
yarn add bootstrap --dev
```


## disables the Symfony UX Stimulus bridge
> webpack.config.js
```
    // enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
    //.enableStimulusBridge('./assets/controllers.json')
```
- delete files
```
assets/bootstrap.js
assets/controllers.json
assets/controllers/*
```
- removed import of app.js
```
// start the Stimulus application
//import './bootstrap';
```


## Enabled Sass
- webpack.config.js
```
// enables Sass/SCSS support
    .enableSassLoader()
```

- app.scss
add app.scss file of assets/styles
```
@import "~bootstrap/scss/bootstrap";
```

- app.js
import it at app.js:
```
import './styles/app.scss';
```


## usage jquery
[offical recommend](https://symfony.com/doc/current/frontend/encore/legacy-applications.html#accessing-jquery-from-outside-of-webpack-javascript-files)

- webpack_encore.yaml
```xml
webpack_encore:
    # The path where Encore is building the assets - i.e. Encore.setOutputPath()
    output_path: '%kernel.project_dir%/public/build'
    # If multiple builds are defined (as shown below), you can disable the default build:
    # output_path: false

    # Set attributes that will be rendered on all script and link tags
    script_attributes:
        defer: false
```

- app.js
```
// require jQuery normally
const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;
```
