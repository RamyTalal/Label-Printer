<?php

namespace Talal\LabelPrinter\Command;

class Pitch implements CommandInterface
{
    const PICA   = 'P';
    const ELITE  = 'M';
    const MICRON = 'g';

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . $this->type;
    }
}
