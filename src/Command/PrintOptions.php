<?php

namespace Talal\LabelPrinter\Command;

class PrintOptions implements CommandInterface
{
    /**
     * @var bool
     */
    protected $optimizeQuality;

    /**
     * @param bool $optimizeQuality
     */
    public function __construct($optimizeQuality = false)
    {
        $this->optimizeQuality = $optimizeQuality;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return '^QS' . ($this->optimizeQuality ? '1' : '0');
    }
}

