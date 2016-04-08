<?php

namespace Talal\LabelPrinter\Command;

class PageFormat implements CommandInterface
{
    /**
     * @var int
     */
    protected $topMargin;

    /**
     * @var int
     */
    protected $bottomMargin;

    /**
     * @param int $topMargin
     * @param int $bottomMargin
     */
    public function __construct($topMargin, $bottomMargin)
    {
        $this->topMargin = $topMargin;
        $this->bottomMargin = $bottomMargin;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        $topLength = $this->topMargin % 256;
        $topHeight = $this->topMargin / 256;
        $bottomLength = $this->bottomMargin % 256;
        $bottomHeight = $this->topMargin / 256;

        if (($topLength + $topHeight * 256) > ($bottomLength + $bottomHeight * 256)) {
            throw new \OutOfRangeException('The top margin must be less than the bottom margin.');
        }

        return chr(27) . '(c' . chr(4) . chr(0) . chr($topLength) .
               chr($topHeight) . chr($bottomLength) . chr($bottomHeight);
    }
}
