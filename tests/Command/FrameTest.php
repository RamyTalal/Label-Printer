<?php

use Talal\LabelPrinter\Command;

class FrameTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\Frame(true);

        $this->assertEquals('1b696631', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\Frame(false);

        $this->assertEquals('1b696630', bin2hex($command->read()));
    }
}
