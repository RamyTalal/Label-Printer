<?php

use Talal\LabelPrinter\Command;

class CharStyleTest extends \PHPUnit_Framework_TestCase
{
    public function testNormalStyle()
    {
        $style = new Command\CharStyle(Command\CharStyle::NORMAL);

        $this->assertEquals('1b7100', bin2hex($style->read()));
    }

    public function testOutlineStyle()
    {
        $style = new Command\CharStyle(Command\CharStyle::OUTLINE);

        $this->assertEquals('1b7101', bin2hex($style->read()));
    }

    public function testShadowStyle()
    {
        $style = new Command\CharStyle(Command\CharStyle::SHADOW);

        $this->assertEquals('1b7102', bin2hex($style->read()));
    }

    public function testOutlineShadowStyle()
    {
        $style = new Command\CharStyle(Command\CharStyle::OUTLINE_SHADOW);

        $this->assertEquals('1b7103', bin2hex($style->read()));
    }
}
