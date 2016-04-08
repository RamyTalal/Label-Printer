<?php

namespace Talal\LabelPrinter\Command;

class Text implements CommandInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return $this->value;
    }
}
