<?php

namespace Talal\LabelPrinter\Command;

class Cut implements CommandInterface
{
    const FULL    = 0b00000001;
    const HALF    = 0b00000010;
    const CHAIN   = 0b00000100;
    const SPECIAL = 0b00001000;

    /**
     * @var int
     */
    protected $type;

    /**
     * @param int $type
     */
    public function __construct($type = self::FULL)
    {
        $this->type = $type;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'iC' . chr($this->type);
    }
}
