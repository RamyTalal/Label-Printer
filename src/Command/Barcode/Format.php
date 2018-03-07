<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Format implements CommandInterface
{
    const CODE39 = 0;
    const ITF = 1;
    const EAN8_UPCA = 5;
    const UPCE = 6;
    const CODABAR = 9;
    const CODE128 = 'a';
    const GS1_128 = 'b';
    const RSS = 'c';
    const CODE93 = 'd';
    const POSTNET = 'e';
    const UPC_EAN_EXT = 'f';

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return 't' . $this->value . 'sp';
    }
}
