FAQ for Symfony
===


## PHP8

### [php 8 attributes](https://symfony.com/blog/new-in-symfony-5-2-php-8-attributes)
v5, v7:
```php
/**
 * @Route("/product", name="product")
 */
```
v8.0+:
```php
#[Route('/product', name: 'product')]
```

### [readonly](https://php.watch/versions/8.1/readonly)
[sf v6.4+](https://github.com/symfony/symfony/compare/v6.3.6...v6.4.0-BETA1) 大量代码使用
```
readonly <type> <variable name>
```
改写.

PHP 8.1 brings support for read-only class properties. 
A class property declared read-only is only allowed to be initialized once, 
and further changes to the property is not allowed.

Read-only class properties are declared with the readonly keyword* in a [typed property](https://php.watch/versions/7.4/typed-properties).
```
class User {
    public readonly int $uid;

    public function __construct(int $uid) {
        $this->uid = $uid;
    }
}

$user = new User(42);
```

### [constructor promotion](https://php.watch/versions/8.0/constructor-property-promotion)
> Note!!!: Only constructor supports property promotion
```
class User {
    public function setUser(public string $name) {}
}
```
```
Fatal error: Cannot declare promoted property outside a constructor in ... on line ...
```

使用 “构造器属性提升” 可以 精简 初始代码。
- standard properties
```
class User {
    private string $name;
    public function __construct(string $name) {
        $this->name = $name;
    }
}
```
- promotion properties
```
class User {
   public function __construct(private string $name) {
   }
}
```


## twig
[is_safe - twif](https://ourcodeworld.com/articles/read/1416/how-to-prevent-a-custom-twig-function-from-escaping-the-output-in-symfony-5)
### twig - [block](https://twig.symfony.com/doc/3.x/tags/block.html)
A: 占位符作用，大部分用在继承中。
```
Blocks are used for inheritance and act as placeholders and replacements at the same time. 
They are documented in detail in the documentation for the extends tag.
```

### [Increment value in twig](https://stackoverflow.com/a/48462161)
```
{% set counter = ( counter | default(0) ) + 1 %}
```

### [How to Concatenate Strings and Variables in Twig?](https://www.designcise.com/web/tutorial/how-to-concatenate-strings-and-variables-in-twig)
php默认的连接符是dot(“.”),    
twig 推荐使用波浪符tilde("~")


## doctrine

### [字段名与保留字相冲突](https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/reference/basic-mapping.html#quoting-reserved-words)
我们的字段名称与doctrine的保留字相冲突，需要使用“`”!
```
Sometimes it is necessary to quote a column or table name because of reserved word conflicts. 
Doctrine does not quote identifiers automatically, because it leads to more problems than it would solve. 
Quoting tables and column names needs to be done explicitly using ticks in the definition.
```
example for:
```
 #[ORM\Column(type: 'integer', name: '`number`', nullable: true)]
```

### join table
![mysql 5 way join table](https://i.stack.imgur.com/VQ5XP.png)

- [INNER JOIN Results from Select Statement using Doctrine QueryBuilder](https://stackoverflow.com/questions/27007090/inner-join-results-from-select-statement-using-doctrine-querybuilder)

- [JoinColumn](https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/reference/attributes-reference.html#attrref_joincolumn)

- exec process
update entity:
```ps
php bin/console make:entity Qualification
```

many to one:
```
New property name (press <return> to stop adding fields):
 > image

 Field type (enter ? to see all types) [string]:
 > ManyToOne

 What class should this entity be related to?:
 > Image

 Is the Qualification.image property allowed to be null (nullable)? (yes/no) [yes]:
 >

 Do you want to add a new property to Image so that you can access/update Qualification objects from it - e.g. $image->getQualifications()? (yes/no) [yes]:
 > no

 updated: src/Entity/Qualification.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >

```

## Bundles

### assert-mapper, stimulus-bundle and ux-turbo
```
composer remove symfony/asset-mapper symfony/ux-turbo symfony/stimulus-bundle
```

### [移除sensio/framework-extra-bundle](https://symfony.com/blog/new-in-symfony-6-2-built-in-cache-security-template-and-doctrine-attributes)
[remove component](https://stackoverflow.com/questions/74685374/package-sensio-framework-extra-bundle-is-abandoned)
```bash
composer remove sensio/framework-extra-bundle
```

1) remove composer.json
```xml
"sensio/framework-extra-bundle": "^6.1",
```

2) remove config
- config/bundles.php
```php
Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
```
- config file
> config/packages/sensio_framework_extra.yaml


### "Psr\Container\ContainerInterface" but no such service exists.
```bash
sudo rm -r vendor/
rm -r composer.lock
composer clearcache
composer install
```
