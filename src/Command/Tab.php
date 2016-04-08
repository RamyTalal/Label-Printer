<?php

namespace Talal\LabelPrinter\Command;

class Tab implements CommandInterface
{
    const HORIZONTAL = 9;
    const VERTICAL   = 11;

    /**
     * @var int
     */
    protected $direction;

    /**
     * @param int $direction
     */
    public function __construct($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr($this->direction);
    }
}
