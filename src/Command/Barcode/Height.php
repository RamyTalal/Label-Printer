<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Height implements CommandInterface
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return 'h' . chr(intval($this->value % 256)) . chr(intval($this->value / 256));
    }
}