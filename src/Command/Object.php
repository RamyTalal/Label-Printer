<?php

namespace Talal\LabelPrinter\Command;

class Object implements CommandInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        if (empty($this->value)) {
            $this->value = '';
        }

        $size = strlen($this->value);
        $n1 = intval($size % 256);
        $n2 = intval($size / 256);

        // Select the name
        $buffer = '^ON' . $this->name . chr(0);

        // Attach a value to the name
        $buffer .= '^DI' . chr($n1) . chr($n2) . $this->value;

        return $buffer;
    }
}
