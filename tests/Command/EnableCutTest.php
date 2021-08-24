<?php

use Talal\LabelPrinter\Command;

class EnableCutTest extends PHPUnit_Framework_TestCase
{
    public function testCutEnabled()
    {
        $command = new Command\EnableCut();

        $this->assertEquals('1b694331', bin2hex($command->read()));
    }
}
