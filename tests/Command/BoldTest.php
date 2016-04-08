<?php

use Talal\LabelPrinter\Command;

class BoldTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\Bold(true);

        $this->assertEquals('1b45', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\Bold(false);

        $this->assertEquals('1b46', bin2hex($command->read()));
    }
}
