<?php

use Talal\LabelPrinter\Command;

class ItalicTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\Italic(true);

        $this->assertEquals('1b34', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\Italic(false);

        $this->assertEquals('1b35', bin2hex($command->read()));
    }
}
