<?php

namespace Talal\LabelPrinter\Command;

interface CommandInterface
{
    /**
     * The command to be processed.
     *
     * @return string
     */
    public function read();
}
