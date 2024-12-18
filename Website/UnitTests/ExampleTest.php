<?php

use PHPUnit\Framework\TestCase;

require_once realpath(__DIR__ . '/../../Object Oriented PHP/php/VimeoVideo.php');


class ExampleTest extends TestCase
{
    protected $video;

    protected function setUp(): void
    {
        $this->video = new VimeoVideo("Funny Cat Video", "123456789");
    }

    protected function tearDown(): void
    {
        unset($this->video);
    }

    public function testGetName()
    {
        $this->assertEquals("funny :) Cat Video", $this->video->getName());

    }

    public function testGetSource()
    {
        $this->assertSame("Vimeo", $this->video->getSource());
    }

    public function testGetEmbedCode()
    {
        $expectedEmbedCode = '<iframe width="560" height="315" src="https://player.vimeo.com/video/123456789" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $this->assertEquals($expectedEmbedCode, $this->video->getEmbedCode());

        $this->assertStringContainsString("123456789", $this->video->getEmbedCode());

        $this->assertStringContainsString("<iframe", $this->video->getEmbedCode());
    }
}
