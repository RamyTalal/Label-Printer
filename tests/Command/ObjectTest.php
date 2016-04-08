<?php

use Talal\LabelPrinter\Command;

class ObjectTest extends PHPUnit_Framework_TestCase
{
    public function testWithNonEmptyNameAndValue()
    {
        $command = new Command\Object('Hello', 'world');

        $this->assertEquals('5e4f4e48656c6c6f005e44490500776f726c64', bin2hex($command->read()));
    }

    public function testWithEmptyNameAndValue()
    {
        $command = new Command\Object('', '');

        $this->assertEquals('5e4f4e005e44490000', bin2hex($command->read()));
    }
}
