<?php

namespace Talal\LabelPrinter\Command;

class Margin implements CommandInterface
{
    const LEFT  = 'left';
    const RIGHT = 'right';

    /**
     * @var string $direction
     */
    protected $direction;

    /**
     * @var int $margin
     */
    protected $margin;

    /**
     * @param int    $margin    Set the margin
     * @param string $direction Set the margin direction, this can either be left or right
     */
    public function __construct($margin, $direction = self::LEFT)
    {
        $this->margin = $margin;
        $this->direction = $direction;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return $this->{$this->direction}();
    }

    /**
     * Set the left margin
     *
     * @return string
     */
    protected function left()
    {
        if ($this->margin > 255 || $this->margin < 0) {
            throw new \OutOfRangeException('The left margin must be between 0 and 255.');
        }

        return chr(27) . chr(108) . chr($this->margin);
    }

    /**
     * Set the right margin
     *
     * @return string
     */
    protected function right()
    {
        if ($this->margin < 1 || $this->margin > 255) {
            throw new \OutOfRangeException('The right margin must be between 1 and 255.');
        }

        return chr(27) . chr(81) . chr($this->margin);
    }
}
