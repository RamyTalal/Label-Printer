<?php

use Talal\LabelPrinter\Command;

class PitchTest extends \PHPUnit_Framework_TestCase
{
    public function testPicaPitch()
    {
        $command = new Command\Pitch(Command\Pitch::PICA);

        $this->assertEquals('1b50', bin2hex($command->read()));
    }

    public function testElitePitch()
    {
        $command = new Command\Pitch(Command\Pitch::ELITE);

        $this->assertEquals('1b4d', bin2hex($command->read()));
    }

    public function testMicronPith()
    {
        $command = new Command\Pitch(Command\Pitch::MICRON);

        $this->assertEquals('1b67', bin2hex($command->read()));
    }
}
