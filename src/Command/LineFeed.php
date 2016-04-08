<?php

namespace Talal\LabelPrinter\Command;

class LineFeed implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(10);
    }
}
