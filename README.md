# Label Printer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/RamyTalal/Label-Printer.svg?style=flat-square)](https://packagist.org/packages/RamyTalal/Label-Printer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/RamyTalal/Label-Printer/master.svg?style=flat-square)](https://travis-ci.org/RamyTalal/Label-Printer)
[![Quality Score](https://img.shields.io/scrutinizer/g/RamyTalal/Label-Printer.svg?style=flat-square)](https://scrutinizer-ci.com/g/RamyTalal/Label-Printer)
[![StyleCI](https://styleci.io/repos/55783562/shield?branch=master)](https://styleci.io/repos/55783562)
[![Total Downloads](https://img.shields.io/packagist/dt/RamyTalal/Label-Printer.svg?style=flat-square)](https://packagist.org/packages/RamyTalal/Label-Printer)


**This library is a WIP.**

Easily print labels with a Brother label printer. This library is tested with the Brother QL-720NW.

## Install

### Composer

``` bash
composer require RamyTalal/Label-Printer
```

## Usage

### ESC/P

``` php
use Talal\LabelPrinter\Printer;
use Talal\LabelPrinter\Mode\Escp;
use Talal\LabelPrinter\Command;

$stream = stream_socket_client('tcp://192.168.1.8:9100', $errorNumber, $errorString);

$printer = new Printer(new Escp($stream));
$font = new Command\Font('brussels', Command\Font::TYPE_OUTLINE);

$printer->addCommand(new Command\CharStyle(Command\CharStyle::NORMAL));
$printer->addCommand($font);
$printer->addCommand(new Command\CharSize(46, $font));
$printer->addCommand(new Command\Align(Command\Align::CENTER));
$printer->addCommand(new Command\Text('Hallo'));
$printer->addCommand(new Command\Cut(Command\Cut::FULL));
$printer->printLabel();

fclose($stream);
```

### Template

``` php
use Talal\LabelPrinter\Printer;
use Talal\LabelPrinter\Mode\Template;
use Talal\LabelPrinter\Command;

$stream = stream_socket_client('tcp://192.168.1.8:9100', $errorNumber, $errorString);

$printer = new Printer(new Template(2, $stream));
$printer->addCommand(new Command\Object('title', 'R. Talal'));
$printer->addCommand(new Command\Object('address', 'H.H. Schefferlaan 9'));
$printer->addCommand(new Command\Object('postalcode', '7771 CW'));
$printer->addCommand(new Command\Object('city', 'Hardenberg'));

$printer->printLabel();

fclose($stream);
```

## Testing

``` bash
composer test
```

## TODO

- [ ] Documentation
- [ ] Generating QR Codes

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email ramy@thinkquality.nl instead of using the issue tracker.

## Credits

- [Ramy Talal](https://github.com/RamyTalal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.