<?php

use Talal\LabelPrinter\Command;

/**
 * Tests for QR code generation.
 */
class QrCodeTest extends PHPUnit_Framework_TestCase
{
    public function testCreateCode39BarcodeSmallWidthWithLargeRatio()
    {
        $command = new Command\QrCode('https://example.com');

        $this->assertEquals(
            '1b6951383230303030323068747470733a2f2f6578616d706c652e636f6d5c5c5c',
            bin2hex($command->read())
        );
    }
}
