<?php

namespace Talal\LabelPrinter\Command;

class PageLength implements CommandInterface
{
    /**
     * @var int
     */
    protected $length;

    /**
     * @param int $length
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        if ($this->length > 12000) {
            throw new \OutOfRangeException('Length must be less than 12000.');
        }

        $height = intval($this->length / 256);
        $length = intval($this->length % 256);

        return chr(27) . '(C' . chr(2) . chr(0) . chr($length) . chr($height);
    }
}
