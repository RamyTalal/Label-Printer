<?php

namespace Talal\LabelPrinter\Mode;

class Escp extends Mode
{
    /**
     * @param resource $resource
     */
    public function __construct($resource)
    {
        $this->setResource($resource);

        $this->setMode();
        $this->initialize();
    }

    /**
     * @inheritdoc
     */
    public function process()
    {
        $this->sendCommand(chr(12));
    }

    /**
     * Set the printer to ESC/P command mode
     *
     * @return  void
     */
    protected function setMode()
    {
        $this->sendCommand(chr(27) . chr(105) . chr(97) . '0');
    }

    /**
     * Initialize command mode
     *
     * @return  void
     */
    protected function initialize()
    {
        $this->sendCommand(chr(27) . chr(64));
    }
}
