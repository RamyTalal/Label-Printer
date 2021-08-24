<?php

use Talal\LabelPrinter\Command;

class DisableCutTest extends PHPUnit_Framework_TestCase
{
    public function testCutDisabled()
    {
        $command = new Command\DisableCut();

        $this->assertEquals('1b694330', bin2hex($command->read()));
    }
}
