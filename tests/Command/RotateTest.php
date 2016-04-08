<?php

use Talal\LabelPrinter\Command;

class RotateTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\Rotate(true);

        $this->assertEquals('1b694c31', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\Rotate(false);

        $this->assertEquals('1b694c30', bin2hex($command->read()));
    }
}
