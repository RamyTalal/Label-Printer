<?php

namespace Talal\LabelPrinter\Command;

use Talal\LabelPrinter\Command\Barcode\Character;
use Talal\LabelPrinter\Command\Barcode\Equalize;
use Talal\LabelPrinter\Command\Barcode\Format;
use Talal\LabelPrinter\Command\Barcode\Height;
use Talal\LabelPrinter\Command\Barcode\Parenthesis;
use Talal\LabelPrinter\Command\Barcode\Ratio;
use Talal\LabelPrinter\Command\Barcode\RssSymbol;
use Talal\LabelPrinter\Command\Barcode\Width;

class Barcode implements CommandInterface
{
    /**
     * @var string
     */
    protected $data;

    /**
     * @var array
     */
    protected $options = [];

    protected $format;

    public function __construct($data, $format, array $options = [])
    {
        $this->data = $data;
        $this->format = $format;
        $this->options = array_merge($options, $this->defaultOptions());
    }

    /**
     * The command to be processed.
     *
     * @return string
     */
    public function read()
    {
        $options = $this->parseOptions();

        $data = chr(27) . 'i' . $options . 'b' . $this->data . chr(92);

        if (in_array($this->format, [Format::CODE128, Format::GS1_128], true)) {
            $data .= chr(92) . chr(92);
        }

        return $data;
    }

    public function addOption($option, $priority)
    {
        $this->options[$priority] = $option;
    }

    protected function defaultOptions(): array
    {
        $this->addOption(new Format($this->format), 0);
        $this->addOption(new Character(Character::OFF), 1);
        $this->addOption(new Height(48), 2);
        $this->addOption(new Width(Width::SMALL), 3);
        $this->addOption(new Parenthesis(Parenthesis::ON), 4);
        $this->addOption(new RssSymbol(RssSymbol::RSS14STD, 2), 5);
        $this->addOption(new Ratio(Ratio::THREE_BY_ONE), 6);
        $this->addOption(new Equalize(Equalize::OFF), 7);

        return $this->options;
    }

    protected function parseOptions()
    {
        $string = '';

        foreach ($this->options as $option) {
            echo $option->read() . PHP_EOL;
            $string .= $option->read();
        }

        return $string;
    }
}
