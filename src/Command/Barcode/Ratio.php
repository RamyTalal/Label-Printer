<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class Ratio implements CommandInterface
{
    const THREE_BY_ONE = 0;
    const TWO_HALF_BY_ONE = 1;
    const TWO_BY_ONE = 2;

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return 'z' . $this->value;
    }
}
