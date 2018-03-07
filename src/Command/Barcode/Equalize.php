<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Equalize implements CommandInterface
{
    const OFF = 0;
    const ON = 1;

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return 'f' . $this->value;
    }
}