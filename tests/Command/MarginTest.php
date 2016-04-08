<?php

use Talal\LabelPrinter\Command;

class MarginTest extends PHPUnit_Framework_TestCase
{
    public function testLeftDirection()
    {
        $command = new Command\Margin(10, Command\Margin::LEFT);

        $this->assertEquals('1b6c0a', bin2hex($command->read()));
    }

    public function testRightDirection()
    {
        $command = new Command\Margin(10, Command\Margin::RIGHT);

        $this->assertEquals('1b510a', bin2hex($command->read()));
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function testLeftDirectionException()
    {
        $command = new Command\Margin(256, Command\Margin::LEFT);
        $command->read();
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function testRightDirectionException()
    {
        $command = new Command\Margin(256, Command\Margin::RIGHT);
        $command->read();
    }
}
