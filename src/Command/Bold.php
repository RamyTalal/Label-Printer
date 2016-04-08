<?php

namespace Talal\LabelPrinter\Command;

class Bold implements CommandInterface
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
        return chr(27) . ($this->enabled ? 'E' : 'F');
    }
}
