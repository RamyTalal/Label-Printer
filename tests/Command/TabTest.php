<?php

use Talal\LabelPrinter\Command;

class TabTest extends PHPUnit_Framework_TestCase
{
    public function testHorizontalDirection()
    {
        $command = new Command\Tab(Command\Tab::HORIZONTAL);

        $this->assertEquals('09', bin2hex($command->read()));
    }

    public function testVerticalDirection()
    {
        $command = new Command\Tab(10, Command\Tab::VERTICAL);

        $this->assertEquals('0a', bin2hex($command->read()));
    }
}
