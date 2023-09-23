<?php

use Talal\LabelPrinter\Command;

class PrintOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\PrintOptions(true);

        $this->assertEquals('5e515331', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\PrintOptions(false);

        $this->assertEquals('5e515330', bin2hex($command->read()));
    }
}
