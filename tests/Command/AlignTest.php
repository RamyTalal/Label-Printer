<?php

use Talal\LabelPrinter\Command;

class AlignTest extends \PHPUnit_Framework_TestCase
{
    public function testLeftAlign()
    {
        $command = new Command\Align(Command\Align::LEFT);

        $this->assertEquals('1b6130', bin2hex($command->read()));
    }

    public function testCenterAlign()
    {
        $command = new Command\Align(Command\Align::CENTER);

        $this->assertEquals('1b6131', bin2hex($command->read()));
    }

    public function testRightAlign()
    {
        $command = new Command\Align(Command\Align::RIGHT);

        $this->assertEquals('1b6132', bin2hex($command->read()));
    }

    public function testJustifiedAlign()
    {
        $command = new Command\Align(Command\Align::JUSTIFIED);

        $this->assertEquals('1b6133', bin2hex($command->read()));
    }
}
