<?php

namespace Talal\LabelPrinter\Command;

class CarriageReturn implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(13);
    }
}
