# Laravel Nova Carbon Modifier Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/illizian/nova-carbon-modifier-field.svg)](https://packagist.org/packages/illizian/nova-carbon-modifier-field)
[![License](https://img.shields.io/packagist/l/Illizian/nova-carbon-modifier-field.svg)](https://github.com/Illizian/nova-carbon-modifier-field/blob/master/LICENSE.md)

## Description

A Laravel Nova field for describing a DateTime modification using [Carbon](https://packagist.org/packages/nesbot/carbon) methhods.

### Demo

![Demo](https://raw.githubusercontent.com/Illizian/nova-carbon-modifier-field/main/docs/nova-carbon-modifier-field-demo.gif)

### Installation

The package can be installed through Composer.

```bash
composer require illizian/nova-carbon-modifier-field
```

## Usage

Add a `\Illizian\NovaCarbonModifier\NovaCarbonModifier`, field to your fields, like so:

```php
/* ... */
use \Illizian\NovaCarbonModifier\NovaCarbonModifier;
/* ... */

class Example extends Resource
{
    /* ... */
    public function fields(Request $request)
    {
        return [
            /* ... */
            NovaCarbonModifier::make(__('Modifier'), 'modifier'),
        ];
    }
```

You may also provide a list of popular modifiers, should you wish with the `popular(array $modifiers)` method:

```php
/* ... */
use \Illizian\NovaSuggestWrapper\NovaSuggestWrapper;
/* ... */

class Example extends Resource
{
    /* ... */
    public function fields(Request $request)
    {
        return [
            /* ... */
            NovaCarbonModifier::make(__('Modifier'), 'modifier')
                ->popular('startOfWeek,hour:10,minute:0', 'subDays:1,hour:13,minute:0'),
        ];
    }
```

As you can see above, a modifier is stored as a comma-seperated string, it takes the following format:

```
"<method>:<parameter>"
"<method>:<parameter>,<method>:<parameter>,<method>:<parameter>"
"<method>"
"<method>,<method>,<method>"
"<method>,<method>:<parameter>,<method>:<parameter>,<method>,<method>:<parameter>,<method>"

etc...
```

The field class provides a static helper for applying this modifier string to a Carbon instance for your convenience:

```php
use \Carbon\Carbon;
use \Illizian\NovaSuggestWrapper\NovaSuggestWrapper;

$date = Carbon::now();
$modifiers = 'startOfWeek,hour:10,minute:0';

$date_modified = NovaCarbonModifier::applyModifier($date, $modifiers);
```

## License

The MIT License (MIT). Please see [License File](https://github.com/Illizian/nova-carbon-modifier-field/blob/main/LICENSE.md) for more information.
