# Label Printer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**This library is a WIP.**

Easily print labels with a Brother label printer.

This library is tested with the following Brother printers,

* QL-720NW - tested by [RamyTalal](https://github.com/RamyTalal)
* QL-810W - tested by [ntaylor-86](https://github.com/ntaylor-86)
* QL-820NWB - Tested by by ArienClaij (https://github.com/arienclaij/) and Luc99 

so it may not work with other printers.

## Install

### Composer

``` bash
$ composer require RamyTalal/Label-Printer
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
$printer->addCommand(new Command\ObjectCommand('title', 'R. Talal'));
$printer->addCommand(new Command\ObjectCommand('address', 'H.H. Schefferlaan 9'));
$printer->addCommand(new Command\ObjectCommand('postalcode', '7771 CW'));
$printer->addCommand(new Command\ObjectCommand('city', 'Hardenberg'));

$printer->printLabel();

fclose($stream);
```

## Testing

``` bash
$ composer test
```

## TODO

- [ ] Documentation
- [ ] Generating QR Codes

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

- [Ramy Talal][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/RamyTalal/Label-Printer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/RamyTalal/Label-Printer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/RamyTalal/Label-Printer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/RamyTalal/Label-Printer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/RamyTalal/Label-Printer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/RamyTalal/Label-Printer
[link-travis]: https://travis-ci.org/RamyTalal/Label-Printer
[link-scrutinizer]: https://scrutinizer-ci.com/g/RamyTalal/Label-Printer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/RamyTalal/Label-Printer
[link-downloads]: https://packagist.org/packages/RamyTalal/Label-Printer
[link-author]: https://github.com/RamyTalal
[link-contributors]: ../../contributors
