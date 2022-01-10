<?php

use Talal\LabelPrinter\Command;

/**
 * Tests for 1D barcode generation.
 * 
 * @todo add additional tests for more combinations and barcode symbologies
 */
class BarcodeTest extends PHPUnit_Framework_TestCase
{
    public function testCreateCode39BarcodeSmallWidthWithLargeRatio()
    {
        $command = new Command\Barcode('1234', 80, Command\Barcode::WIDTH_SMALL, 'code39', false, 3);

        $this->assertEquals('1b697400720068500077017a0042313233345c', bin2hex($command->read()));
    }
    
    public function testCreateCode39BarcodeMediumWidthWithMediumRatio()
    {
        $command = new Command\Barcode('ABCD', 80, Command\Barcode::WIDTH_MEDIUM, 'code39', false, 2.5);

        $this->assertEquals('1b697400720068500077027a0142414243445c', bin2hex($command->read()));
    }

    public function testCreateCode39BarcodeMediumWidthWithSmallRatio()
    {
        $command = new Command\Barcode('ABCD', 80, Command\Barcode::WIDTH_MEDIUM, 'code39', false, 2);

        $this->assertEquals('1b697400720068500077027a0242414243445c', bin2hex($command->read()));
    }
    
    public function testCreateEan13BarcodeMediumWidthWithMediumRatio()
    {
        $command = new Command\Barcode('1234567890128', 80, Command\Barcode::WIDTH_MEDIUM, 'ean-13', true, 2);

        $this->assertEquals('1b697405720068500077027a0242313233343536373839303132385c', bin2hex($command->read()));
    }
}
