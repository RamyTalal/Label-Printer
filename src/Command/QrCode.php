<?php

namespace Talal\LabelPrinter\Command;

class QrCode implements CommandInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function read()
    {
        return
            // QR Code Specs; Page 71
            chr(27) .                     // ESC
            'iQ' .
            chr(56) .                     // Cell size: 8;56
            chr(50) .                     // Symbol type: 2; (default value)
            chr(48) .                     // Structured Append setting: 0; Not partitioned (default value)
            chr(48) .                     // Code number: 0;
            chr(48) .                     // Number of partitions: 0;
            chr(48) .                     // Parity data: 0;
            chr(50) .                     // Error correction level: 2; Standard level (default value)
            chr(48) .                     // Data input method: 0; Auto input (default value)
            $this->value .                // Barcode data
            chr(92) . chr(92) . chr(92);  // Three backslashes
    }
}
