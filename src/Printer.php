<?php

namespace Talal\LabelPrinter;

use Talal\LabelPrinter\Mode\Mode;
use Talal\LabelPrinter\Command\CommandInterface;

class Printer
{
    /**
     * @var Mode $mode
     */
    protected $mode;

    /**
     * Constructor
     *
     * @param Mode $mode
     */
    public function __construct(Mode $mode)
    {
        $this->mode = $mode;
    }

    /**
     * Get the print mode
     *
     * @return Mode   mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param CommandInterface $command
     * @return $this
     */
    public function addCommand(CommandInterface $command)
    {
        $this->mode->addCommand($command);

        return $this;
    }

    /**
     * Print the label
     *
     * @return void
     */
    public function printLabel()
    {
        foreach ($this->mode->getCommands() as $command) {
            $this->mode->sendCommand($command->read());
        }

        $this->mode->process();
    }
}
