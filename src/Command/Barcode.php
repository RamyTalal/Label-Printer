<?php

namespace Talal\LabelPrinter\Command;

class Barcode implements CommandInterface
{
    protected $t;     // Type
    protected $r;     // Characters below barcode
    protected $h1;    // Height number 1
    protected $h2;    // Height number 2
    protected $w;     // Width
    protected $e;     // Parentheses deletion
    protected $z;     // Ratio between thick and thin bars
    protected $f;     // Equalize bar lengths
    protected $value; // Value to print as barcode
    
    const WIDTH_EXTRA_SMALL = 0;
    const WIDTH_SMALL = 1;
    const WIDTH_MEDIUM = 2;
    const WIDTH_LARGE = 3;
    const WIDTH_EXTRA_EXTRA_SMALL = 4;
    
    protected $types = [
        'CODE39' => '0',
        'ITF' => '1',
        'EAN-8' => '5',
        'EAN-13' => '5',
        'UPC-A' => '5',
        'UPC-E' => '6',
        'CODABAR' => '9',
        'CODE128' => 'a',
        'GS1-128' => 'b',
        'UCC/EAN-128' => 'b',
        'RSS SYMBOLS' => 'c',
        'CODE93' => 'd',
        'POSTNET' => 'e',
        'UPC/EAN EXT' => 'f',
        'MSI' => 'g'
    ];
    
    protected $RSSSymbolsModels = [
        'RSS-14 STANDARD' => '0',
        'RSS-14 TRUNCATED' => '1',
        'RSS-14 STACKED' => '2',
        'RSS-14 STACKED OMNIDIRECTIONAL' => '3',
        'RSS LIMITED' => '4',
        'RSS EXPANDED STANDARD' => '5',
        'RSS EXPANDED STACKED' => '6'
    ];

    /**
     * Constructor.
     */
    public function __construct(
        $value,
        $height,
        $width = self::WIDTH_MEDIUM,
        $type = 'code39',
        $charBelow = false,
        $ratio = 2.5
    ) {
        $this->value = $value;
        $this->t = $this->types[strtoupper($type)];
        $this->w = $width;

        $this->h2 = floor($height / 256);
        $this->h1 = $height % 256; // modulo to get remainder from division

        if ($ratio >= 3) {
            $this->z = 0;
        } elseif ($ratio >= 2.5) {
            $this->z = 1;
        } else {
            $this->z = 2;
        }
    }
    
    public function getTString()
    {
        return 't' . chr($this->t);
    }

    public function getRString()
    {
        return 'r' . chr($this->r);
    }

    public function getHString()
    {
        return 'h' . chr($this->h1) . chr($this->h2);
    }

    public function getWString()
    {
        return 'w' . chr($this->w);
    }

    public function getZString()
    {
        return 'z' . chr($this->z);
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'i' . $this->getTString() . $this->getRString() . $this->getHString() . $this->getWString() .
            $this->getZString() . 'B' . $this->value . '\\';
    }
}
