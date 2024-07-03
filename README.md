# Display Filament RepeatableEntry as table

[![Latest Version on Packagist](https://img.shields.io/packagist/v/icetalker/filament-table-repeatable-entry.svg?style=flat-square)](https://packagist.org/packages/icetalker/filament-table-repeatable-entry)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/icetalker/filament-table-repeatable-entry/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/icetalker/filament-table-repeatable-entry/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/icetalker/filament-table-repeatable-entry/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/icetalker/filament-table-repeatable-entry/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/icetalker/filament-table-repeatable-entry.svg?style=flat-square)](https://packagist.org/packages/icetalker/filament-table-repeatable-entry)

This is a Filament Infolists Component, use for display RepetableEntry as a table. In case you are using [TableRepeater]() instead of RelationManager.

## Installation

You can install the package via composer:

```bash
composer require icetalker/filament-table-repeatable-entry
```

## Usage

```php
namespace Icetalker\FilamentTableRepeater\Forms\Components;

TableRepeatableEntry::make('items')
    ->schema([
        Infolists\Components\TextEntry::make('product'),
        Infolists\Components\TextEntry::make('quantity'),
        Infolists\Components\TextEntry::make('price'),
    ])
    ->columnSpan(2),
```

### Striped Row

To enable striped table rows, you can use the `striped()` method:

```php
namespace Icetalker\FilamentTableRepeater\Forms\Components;

TableRepeatableEntry::make('items')
    ->schema([
        Infolists\Components\TextEntry::make('product'),
        Infolists\Components\TextEntry::make('quantity'),
        Infolists\Components\TextEntry::make('price'),
    ])
    ->striped()
    ->columnSpan(2),
```

### Show Index

To show table row index, please use `showIncdex()`:

```php
namespace Icetalker\FilamentTableRepeater\Forms\Components;

TableRepeatableEntry::make('items')
    ->schema([
        Infolists\Components\TextEntry::make('product'),
        Infolists\Components\TextEntry::make('quantity'),
        Infolists\Components\TextEntry::make('price'),
    ])
    ->striped()
    ->columnSpan(2),
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Hwang](https://github.com/icetalker)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
