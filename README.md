# go-out

External links hiding and redirecting script.

## How to install

1. Copy script dir to your site dir.
2. Create "config.php" file with config and links list.

### Config file sample

```php
<?php

return array(
	'links' => array(
		'linkname1' => 'http://link1.com/',
		'linkname2' => 'http://link2.com/',
	),
	'logRoutes' => array(
		array('fileName' => 'full.log'),
    ),
);
```

## Links

There are two ways to setup links: named links and inline links.

### Named links

Urls of named links look like this:

```url
go-out/linkname1
```

Script gets link url with this name from config.

### Inline links

Urls of named links look like this:

```url
go-out/?http%3A%2F%2Flink1.com%2F
```

Url is urldecoded parameters string.
