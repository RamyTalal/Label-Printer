<?php

use Talal\LabelPrinter\Command;

class AutoCutTest extends PHPUnit_Framework_TestCase
{
    public function testCutEnabled()
    {
        $command = new Command\AutoCut(Command\AutoCut::ENABLED);

        $this->assertEquals('1b694331', bin2hex($command->read()));
    }
    
    public function testCutDisabled()
    {
        $command = new Command\AutoCut(Command\AutoCut::DISABLED);

        $this->assertEquals('1b694330', bin2hex($command->read()));
    }
}
