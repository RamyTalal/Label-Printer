<?php

use Talal\LabelPrinter\Command;

class UnderlineTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidThicknessException()
    {
        $this->setExpectedException('InvalidArgumentException');

        new Command\Underline(10);
    }

    public function testMinimumAllowedThickness()
    {
        $command = new Command\Underline(0);

        $this->assertEquals('1b2d30', bin2hex($command->read()));
    }

    public function testMaximumAllowedThickness()
    {
        $command = new Command\Underline(4);

        $this->assertEquals('1b2d34', bin2hex($command->read()));
    }
}
