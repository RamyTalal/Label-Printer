<?php

use Talal\LabelPrinter\Command;

class CutTest extends \PHPUnit_Framework_TestCase
{
    public function testFullCut()
    {
        $command = new Command\Cut(Command\Cut::FULL);

        $this->assertEquals('1b694301', bin2hex($command->read()));
    }

    public function testHalfCut()
    {
        $command = new Command\Cut(Command\Cut::HALF);

        $this->assertEquals('1b694302', bin2hex($command->read()));
    }

    public function testChainCut()
    {
        $command = new Command\Cut(Command\Cut::CHAIN);

        $this->assertEquals('1b694304', bin2hex($command->read()));
    }

    public function testSpecialCut()
    {
        $command = new Command\Cut(Command\Cut::SPECIAL);

        $this->assertEquals('1b694308', bin2hex($command->read()));
    }
}
