<?php

namespace Talal\LabelPrinter\Command;

use InvalidArgumentException;

class CharSize implements CommandInterface
{
    /**
     * @var array
     */
    protected $sizes = [
        'bitmap' => [
            24 => 0, 32 => 0, 48 => 0,
        ],
        'outline' => [
            33 => 0, 38 => 0, 42 => 0, 46 => 0,
            50 => 0, 58 => 0, 67 => 0, 75 => 0,
            83 => 0, 92 => 0, 100 => 0, 117 => 0,
            133 => 0, 150 => 0, 167 => 0, 200 => 0,

            233 => 0, 11 => 1, 44 => 1, 77 => 1,
            111 => 1, 144 => 1
        ]
    ];

    /**
     * @var int
     */
    protected $size;
    
    /**
     * @var string
     */
    protected $type;

    /**
     * @param int   $size
     * @param Font  $font
     */
    public function __construct($size, Font $font)
    {
        $this->type = $font->getType();
        $this->size = $size;

        if (! isset($this->sizes[$this->type][$size])) {
            throw new InvalidArgumentException('Please provide a valid char size.');
        }
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'X' . chr(0) . chr($this->size) . chr($this->sizes[$this->type][$this->size]);
    }
}
