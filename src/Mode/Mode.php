<?php

namespace Talal\LabelPrinter\Mode;

use Talal\LabelPrinter\Command\CommandInterface;

abstract class Mode
{
    /**
     * @var array
     */
    protected $commands = [];
    
    /**
     * @var resource
     */
    protected $resource;

    /**
     * @param resource $resource
     */
    public function setResource($resource)
    {
        if (! is_resource($resource)) {
            throw new \InvalidArgumentException('An invalid resource has been provided.');
        }

        $this->resource = $resource;
    }

    /**
     * Closes the connection resource.
     */
    public function closeResource()
    {
        fclose($this->resource);
    }

    /**
     * @param CommandInterface $command
     */
    public function addCommand(CommandInterface $command)
    {
        $this->commands[] = $command;
    }

    /**
     * @return CommandInterface[]
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @param string    $data
     * @return string
     */
    public function sendCommand($data)
    {
        fwrite($this->resource, $data);

        return $data;
    }

    /**
     * Send the print-label command
     *
     * @return void
     */
    abstract public function process();
}
