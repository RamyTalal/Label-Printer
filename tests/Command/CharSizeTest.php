<?php

use Talal\LabelPrinter\Command;

class CharSizeTest extends PHPUnit_Framework_TestCase
{
    public function testBitmapSize()
    {
        $font = new Command\Font('brussels', Command\Font::TYPE_BITMAP);
        $size = new Command\CharSize(24, $font);

        $this->assertEquals('1b58001800', bin2hex($size->read()));
    }

    public function testOutlineSize()
    {
        $font = new Command\Font('helsinki', Command\Font::TYPE_OUTLINE);
        $size = new Command\CharSize(33, $font);

        $this->assertEquals('1b58002100', bin2hex($size->read()));
    }

    public function testInvalidSize()
    {
        $this->setExpectedException('InvalidArgumentException');

        $font = new Command\Font('helsinki', Command\Font::TYPE_OUTLINE);
        $size = new Command\CharSize(34, $font);
        
        $size->read();
    }
}
