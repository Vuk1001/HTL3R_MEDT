<?php

require_once 'AbstractVideo.php';

class YouTubeVideo extends AbstractVideo {
    private $videoId;

    public function __construct($name, $videoId) {
        parent::__construct($name, 'YouTube');
        $this->videoId = $videoId;
    }

    public function getEmbedCode(): string {
        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $this->videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}
