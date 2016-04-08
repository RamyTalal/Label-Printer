<?php

use Talal\LabelPrinter\Command;

class CarriageReturnTest extends PHPUnit_Framework_TestCase
{
    public function testCarriageReturn()
    {
        $command = new Command\CarriageReturn();

        $this->assertEquals('0d', bin2hex($command->read()));
    }
}
