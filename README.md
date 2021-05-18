With this package you can change textContent of HTML tag. 

# install using composer
``` 
composer require eissaweb/php-html-text-content:0.1
```
# Examples:
## #1  Using String as parameter
```php
<?php 

require_once 'vendor/autoload.php';

use PHPHtmlTextContent\ReplaceTextContent;

$str = '<div>Hello World!!2</div>';
// ReplaceTextContent::replace($str, $search, $replace, $callback = null);
$replaced = ReplaceTextContent::replace($str, '2', '');

echo $replaced;
```

## #2 using array of string as a parameter
```php
<?php 

require_once 'vendor/autoload.php';

use PHPHtmlTextContent\ReplaceTextContent;

$str = '<div>Hello World??2</div>';
// ReplaceTextContent::replace($str, $search, $replace, $callback = null);
$replaced = ReplaceTextContent::replace($str, ['2', '?'], ['', '!']);

echo $replaced;
```
## #3 passing callback 
you can pass callback as 4th parameter to modify the replaced string.
```php 
<?php 

require_once 'vendor/autoload.php';

use PHPHtmlTextContent\ReplaceTextContent;

$str = '<div>Hello World??2</div>';
// ReplaceTextContent::replace($str, $search, $replace, $callback = null);
$replaced = ReplaceTextContent::replace($str, ['2', '?'], ['', '!'], function ($replacedStr) {
    return '<span style="color: red;">' . $replacedStr . '</span>';
});

echo $replaced;
```
