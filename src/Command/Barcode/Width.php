<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Width implements CommandInterface
{
    const XXSMALL = 4;
    const XSMALL = 0;
    const SMALL = 1;
    const MEDIUM = 2;
    const LARGE = 3;

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return 'w' . $this->value;
    }
}
