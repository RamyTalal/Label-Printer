<?php

use Talal\LabelPrinter\Command;

class CompressedCharacterTest extends PHPUnit_Framework_TestCase
{
    public function testEnabled()
    {
        $command = new Command\CompressedCharacter(true);

        $this->assertEquals('0f', bin2hex($command->read()));
    }

    public function testDisabled()
    {
        $command = new Command\CompressedCharacter(false);

        $this->assertEquals('12', bin2hex($command->read()));
    }
}
