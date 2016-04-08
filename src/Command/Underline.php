<?php

namespace Talal\LabelPrinter\Command;

class Underline implements CommandInterface
{
    /**
     * @var int
     */
    protected $thickness;

    /**
     * @var array
     */
    protected $allowedThickness = [0, 1, 2, 3, 4];

    /**
     * @param int $thickness
     */
    public function __construct($thickness)
    {
        if (! in_array($thickness, $this->allowedThickness)) {
            throw new \InvalidArgumentException('The provided thickness is not allowed.');
        }

        $this->thickness = $thickness;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . chr(45) . $this->thickness;
    }
}
