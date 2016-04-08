<?php

use Talal\LabelPrinter\Command;

class DoubleStrikeTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\DoubleStrike(true);

        $this->assertEquals('1b47', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\DoubleStrike(false);

        $this->assertEquals('1b48', bin2hex($command->read()));
    }
}
