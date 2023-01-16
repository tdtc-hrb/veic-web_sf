usage knp-paginator
===

使用[knp-paginator](https://github.com/KnpLabs/KnpPaginatorBundle)

install:
```
composer require knplabs/knp-paginator-bundle:6.1.1
```

[当前版本 - v6.1.1](https://github.com/KnpLabs/KnpPaginatorBundle/releases/tag/v6.1.1)

# controller

## method invoke
- parameter
```php
        PaginatorInterface $paginator,
        Request $request,
```

- implement
```php
        $typeId = $typeRepo->findIdByName('news');

        $allNewsQuery = $artRepo->findByTypeId($typeId, 4136);

        // Paginate the results of the query
        $appointments = $paginator->paginate(
            // Doctrine Query, not results
            $allNewsQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            13
        );
```

## import
- paginator interface
```php
// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;
```
- request
```php
use Symfony\Component\HttpFoundation\Request;
```

## annotation
```php
#[Route('/Company/news', name: 'news')]
```


# config
> config/packages/knp_paginator.yaml
```yaml
# config/packages/knp_paginator.yaml
knp_paginator:
    page_range: 3                       # number of links showed in the pagination menu (e.g: you have 10 pages, a page_range of 3, on the 5th page you'll see links to page 4, 5, 6)
    default_options:
        page_name: page                 # page query parameter name
        sort_field_name: sort           # sort field query parameter name
        sort_direction_name: direction  # sort direction query parameter name
        distinct: true                  # ensure distinct results, useful when ORM queries are using GROUP BY statements
        filter_field_name: filterField  # filter field query parameter name
        filter_value_name: filterValue  # filter value query paameter name
    template:
        pagination: '@KnpPaginator/Pagination/bootstrap_v5_pagination.html.twig'     # sliding pagination controls template
        sortable: '@KnpPaginator/Pagination/sortable_link.html.twig' # sort link template
        filtration: '@KnpPaginator/Pagination/filtration.html.twig'  # filters template
```


# twig template
```twig
<!-- pagination -->
{{ knp_pagination_render(article_list) }}
```

# translations

## zh-cn
> KnpPaginatorBundle.zh-cn.yml
```xml
label_next: 下一页
label_previous: 上一页
```

## en-us
> KnpPaginatorBundle.en-us.yml
```xml
label_next: Next
label_previous: Previous
```

# Ref
- [PaginatorInterface - v6](https://ourcodeworld.com/articles/read/802/how-to-install-the-knppaginatorbundle-to-paginate-doctrine-queries-in-symfony-4)
