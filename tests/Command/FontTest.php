<?php

use Talal\LabelPrinter\Command\Font;

class FontTest extends PHPUnit_Framework_TestCase
{
    public function testBitmapFont()
    {
        $font = new Font('helsinki', Font::TYPE_BITMAP);

        $this->assertEquals('1b6b03', bin2hex($font->read()));
    }

    public function testOutlineFont()
    {
        $font = new Font('helsinki', Font::TYPE_OUTLINE);

        $this->assertEquals('1b6b0b', bin2hex($font->read()));
    }

    public function getFontType()
    {
        $font = new Font('helsinki', Font::TYPE_BITMAP);

        $this->assertEquals('bitmap', $font->getType());
    }

    public function testInvalidFontType()
    {
        $this->setExpectedException('InvalidArgumentException');

        new Font('brussels', 'non-existing');
    }

    public function testInvalidFont()
    {
        $this->setExpectedException('InvalidArgumentException');

        new Font('non-existing');
    }
}
