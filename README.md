# cradle-mail
Mail Handling for Cradle with Swift Mailer

## 1. Requirements

You should be using CradlePHP currently at `dev-master`. See
[https://cradlephp.github.io/](https://cradlephp.github.io/) for more information.

## 2. Install

```php
composer require cblanquera/cradle-handlebars
```

Then in `/bootstrap.php`, add

```php
->register('cblanquera/cradle-handlebars')
```

## 3. Usage

```php
$template = cradle('global')->handlebars()->compile('{{foo}}');
echo $template(array('foo' => 'bar'));
```

See [http://handlebarsjs.com/](http://handlebarsjs.com/) for more information
about handlebars.
