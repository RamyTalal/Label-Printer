<?php

use Talal\LabelPrinter\Command;

class PageFormatTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException OutOfRangeException
     */
    public function testHighTopMarginException()
    {
        $command = new Command\PageFormat(100, 80);

        $command->read();
    }

    public function testValidMargin()
    {
        $command = new Command\PageFormat(80, 100);

        $this->assertEquals('1b2863040050006400', bin2hex($command->read()));
    }
}
