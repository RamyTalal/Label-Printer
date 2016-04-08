<?php

use Talal\LabelPrinter\Command;

class TextTest extends PHPUnit_Framework_TestCase
{
    public function testTextValue()
    {
        $command = new Command\Text('Hello World');

        $this->assertEquals('48656c6c6f20576f726c64', bin2hex($command->read()));
    }
}
