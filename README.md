Yii2 Bootstrap4 Alert widget
=============================
Contains widget class for display alerts in views and add it from controllers.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist nixar59/yii2-bs4-alert "*"
```

or add

```
"nixar59/yii2-bs4-alert": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your view to display alerts  :

```php
<?= \nixar59\alert\Alert::widget(); ?>
```
 To add alerts use static methods :
 ```php
<?php 

use nixar59\alert\Alert;

// .alert-primary
Alert::primary('Primary message.');
// .alert-secondary
Alert::secondary('Secondary message.');
// .alert-success
Alert::success('Success message.');
// .alert-danger
Alert::danger('Danger message.');
// .alert-warning
Alert::warning('Warning message.');
// .alert-info
Alert::info('Info message.');
// .alert-light
Alert::light('Light message.');
// .alert-danger
Alert::dark('Dark message.');

?>
```

See also
--------

* [Bootstrap docs](https://getbootstrap.com/docs/4.3/components/alerts/)