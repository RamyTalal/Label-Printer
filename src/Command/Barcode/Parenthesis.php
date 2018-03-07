<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Parenthesis implements CommandInterface
{
    const OFF = 1;
    const ON = 0;

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return 'e' . $this->value;
    }
}