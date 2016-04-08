<?php

namespace Talal\LabelPrinter\Command;

class CharStyle implements CommandInterface
{
    const NORMAL         = 0;
    const OUTLINE        = 1;
    const SHADOW         = 2;
    const OUTLINE_SHADOW = 3;

    /**
     * @var int
     */
    protected $style;

    /**
     * @param int $style
     */
    public function __construct($style = self::NORMAL)
    {
        $this->style = $style;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'q' . chr($this->style);
    }
}
