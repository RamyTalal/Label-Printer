<?php

use Talal\LabelPrinter\Command;

class DoubleWidthTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\DoubleWidth(true);

        $this->assertEquals('1b5731', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\DoubleWidth(false);

        $this->assertEquals('1b5730', bin2hex($command->read()));
    }
}
