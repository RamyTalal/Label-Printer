<?php

namespace Talal\LabelPrinter\Command\Barcode;

use Talal\LabelPrinter\Command\CommandInterface;

class RssSymbol implements CommandInterface
{
    const RSS14STD = 0;
    const RSS14TRUN = 1;
    const RSS14STACKED = 2;
    const RSS14STACKEDOMNI = 3;
    const RSSLIMITED = 4;
    const RSSEXPANDEDSTD = 5;
    const RSSEXPANDEDSTACKED = 6;

    protected $value;

    protected $horizontalCharacters;

    public function __construct($value, int $horizontalCharacters)
    {
        $this->value = $value;

        if ($horizontalCharacters > 20 || $horizontalCharacters < 2) {
            throw new \InvalidArgumentException('The number of horizontal characters must be between 2 and 20.');
        }

        $this->horizontalCharacters = $horizontalCharacters;
    }

    public function read()
    {
        return 'o' . $this->value . 'c' . chr($this->horizontalCharacters);
    }
}