<?php

use Talal\LabelPrinter\Command;

class PageLengthTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException OutOfRangeException
     */
    public function testHighTopMarginException()
    {
        $command = new Command\PageLength(12001);

        $command->read();
    }

    public function testValidLength()
    {
        $command = new Command\PageLength(8000);

        $this->assertEquals('1b28430200401f', bin2hex($command->read()));
    }
}
