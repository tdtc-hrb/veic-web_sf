usage knp-paginator
===

使用[knp-paginator](https://github.com/KnpLabs/KnpPaginatorBundle)

install:
```
composer require knplabs/knp-paginator-bundle:5.9.0
```

注意： [knp-paginator - v5](https://github.com/KnpLabs/KnpPaginatorBundle/releases/tag/v5.9.0) 仅匹配SF6以下!

# controller

import:
```php
use Psr\Container\ContainerInterface;
```

di in method parameter:
```
ContainerInterface $container,
```

controller invoke:
```php
$typeId = $typeRepo->findIdByName('news');

$allNewsQuery = $artRepo->findByTypeId($typeId, 4136);

// Paginate the results of the query
$pagenator=$container->get('knp_paginator');
//$appointments = $paginator->paginate(
$appointments = $pagenator->paginate(
	// Doctrine Query, not results
	$allNewsQuery,
	// Define the page parameter
	$request->query->getInt('page', 1),
	// Items per page
	13
);
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

# Ref
- [ContainerInterface](https://medium.com/@isakulaksiz.ce/symfony-pagination-3021c050ab8b)
