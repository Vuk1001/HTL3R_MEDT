<?php

require_once 'AbstractVideo.php';

class VimeoVideo extends AbstractVideo {
    private $videoId;

    public function __construct($name, $videoId) {
        parent::__construct($name, 'Vimeo');
        $this->videoId = $videoId;
    }

    public function getEmbedCode(): string {
        return '<iframe width="560" height="315" src="https://player.vimeo.com/video/' . $this->videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}