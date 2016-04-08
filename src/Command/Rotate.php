<?php

namespace Talal\LabelPrinter\Command;

class Rotate implements CommandInterface
{
    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @param bool $enabled
     */
    public function __construct($enabled = true)
    {
        $this->enabled = $enabled;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . chr(105) . chr(76) . (int) $this->enabled;
    }
}
