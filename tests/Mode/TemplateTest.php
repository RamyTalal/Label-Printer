<?php

use Talal\LabelPrinter\Mode;

class TemplateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mode\Template
     */
    protected $mode;
    protected $stream;

    public function setUp()
    {
        $this->stream = fopen('php://temp', 'rw');
        $this->mode = new Mode\Template(1, $this->stream);
    }

    public function tearDown()
    {
        fclose($this->stream);
    }

    public function testSetId()
    {
        $this->mode->setId(2);

        rewind($this->stream);
        $this->assertEquals('1b6961335e49495e54533030315e5453303032', bin2hex(stream_get_contents($this->stream)));
    }

    public function testPrintLabel()
    {
        $this->mode->process();

        rewind($this->stream);
        $this->assertEquals('1b6961335e49495e54533030315e4646', bin2hex(stream_get_contents($this->stream)));
    }

    public function testSendCommand()
    {
        $command = $this->mode->sendCommand('a-command');

        $this->assertEquals('a-command', $command);
    }
}
