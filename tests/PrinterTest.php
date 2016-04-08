<?php

use Talal\LabelPrinter\Printer;
use Talal\LabelPrinter\Mode;
use Talal\LabelPrinter\Command;

class PrinterTest extends PHPUnit_Framework_TestCase
{
    protected $stream;

    public function setUp()
    {
        $this->stream = fopen('php://temp', 'rw');
    }

    public function tearDown()
    {
        fclose($this->stream);
    }

    public function testPrintLabelWithEscpMode()
    {
        $printer = new Printer(new Mode\Escp($this->stream));
        $printer->addCommand(new Command\Bold());
        $printer->printLabel();

        rewind($this->stream);
        $this->assertEquals('1b6961301b401b450c', bin2hex(stream_get_contents($this->stream)));
    }

    public function testPrintLabelWithTemplateMode()
    {
        $printer = new Printer(new Mode\Template(1, $this->stream));
        $printer->addCommand(new Command\Bold());
        $printer->printLabel();

        rewind($this->stream);
        $this->assertEquals('1b6961335e49495e54533030311b455e4646', bin2hex(stream_get_contents($this->stream)));
    }

    public function testGetMode()
    {
        $printer = new Printer(new Mode\Escp($this->stream));
        $this->assertInstanceOf(Mode\Mode::class, $printer->getMode());
    }

    public function testAddCommand()
    {
        $printer = new Printer(new Mode\Escp($this->stream));
        $printer->addCommand(new Command\Bold());

        $this->assertCount(1, $printer->getMode()->getCommands());
    }

    public function testAddMultipleCommands()
    {
        $printer = new Printer(new Mode\Escp($this->stream));
        $printer->addCommand(new Command\Bold());
        $printer->addCommand(new Command\Underline(2));
        $printer->addCommand(new Command\Cut(Command\Cut::FULL));

        $this->assertCount(3, $printer->getMode()->getCommands());
    }

    public function testInvalidResource()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        new Printer(new Mode\Escp('non-existing'));
    }
}
