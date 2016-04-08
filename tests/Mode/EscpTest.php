<?php

use Talal\LabelPrinter\Mode;

class EscpTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mode\Escp
     */
    protected $mode;

    protected $stream;

    public function setUp()
    {
        $this->stream = fopen('php://temp', 'rw');
        $this->mode = new Mode\Escp($this->stream);
    }

    public function tearDown()
    {
        fclose($this->stream);
    }

    public function testPrintLabel()
    {
        $this->mode->process();

        rewind($this->stream);
        $this->assertEquals('1b6961301b400c', bin2hex(stream_get_contents($this->stream)));
    }

    public function testSendCommand()
    {
        $command = $this->mode->sendCommand('a-command');

        $this->assertEquals('a-command', $command);
    }
}
