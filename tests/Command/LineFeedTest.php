<?php

use Talal\LabelPrinter\Command;

class LineFeedTest extends PHPUnit_Framework_TestCase
{
    public function testLineFeed()
    {
        $command = new Command\LineFeed();

        $this->assertEquals('0a', bin2hex($command->read()));
    }
}
