<?php

namespace Talal\LabelPrinter\Command;

use InvalidArgumentException;

class Font implements CommandInterface
{
    const TYPE_BITMAP  = 'bitmap';
    const TYPE_OUTLINE = 'outline';

    /**
     * @var array
     */
    protected $fonts = [
        self::TYPE_BITMAP => [
            'brougham' => 0, 'letter_gothic_bold' => 1,
            'brussels' => 2, 'helsinki' => 3,
            'san_diego' => 4
        ],
        self::TYPE_OUTLINE => [
            'letter_gothic' => 9, 'brussels' => 10,
            'helsinki' => 11
        ]
    ];

    /**
     * @var string
     */
    protected $font;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $font
     * @param string $type
     */
    public function __construct($font, $type = self::TYPE_BITMAP)
    {
        if (! in_array($type, array_keys($this->fonts))) {
            throw new InvalidArgumentException('Please provide a valid font type.');
        }

        if (! isset($this->fonts[$type][$font])) {
            throw new InvalidArgumentException('Please provide a valid font.');
        }

        $this->font = $this->fonts[$type][$font];
        $this->type = $type;
    }

    /**
     * Get the font type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'k' . chr($this->font);
    }
}
