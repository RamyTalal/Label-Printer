<?php

namespace Talal\LabelPrinter\Command;

class Align implements CommandInterface
{
    const LEFT      = 0;
    const CENTER    = 1;
    const RIGHT     = 2;
    const JUSTIFIED = 3;
    
    /**
     * @var string $alignment
     */
    protected $alignment;

    /**
     * @param string $alignment
     */
    public function __construct($alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'a' . $this->alignment;
    }
}
