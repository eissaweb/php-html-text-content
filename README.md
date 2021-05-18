With this package you can change textContent of HTML tag. 

# install using composer
``` 
composer require eissaweb/php-html-text-content:0.1
```
# Examples:
## #1  Using String as a parameter
```php
<?php 

require_once 'vendor/autoload.php';

use PHPHtmlTextContent\ReplaceTextContent;

$str = '<div>Hello World!!2</div></p>New Line 2</p>';
// ReplaceTextContent::replace($str, $search, $replace, $callback = null);
$replaced = ReplaceTextContent::replace($str, '2', '');

echo $replaced;
//Hello World!!
// New Line
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
// Hello World!!
```
## #3 passing callback 
you can pass callback as 4th parameter to modify the replaced string.

```php 
<?php 

require_once 'vendor/autoload.php';

use PHPHtmlTextContent\ReplaceTextContent;

$str = '<div>Hello World??2</div><div class="username"><a href="github.com/eissaweb">Eissaweb??</a></div>';
// ReplaceTextContent::replace($str, $search, $replace, $callback = null);
$replaced = ReplaceTextContent::replace($str, ['2', '?'], ['', '!'], function ($replacedStr) {
    // in this case you can style the replaced text by using inline style or adding html classes to the tag as you want.
    return '<span>' . $replacedStr . '</span>';
});

echo $replaced;
// Hello World!!
// Eissaweb!!
```
