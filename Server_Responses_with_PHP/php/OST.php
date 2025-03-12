<?php

class Song implements JsonSerializable {
    private $id;
    private $name;
    private $artist;
    private $trackNumber;
    private $duration;

    public function __construct($id, $name, $artist, $trackNumber, $duration) {
        $this->id = $id;
        $this->name = $name;
        $this->artist = $artist;
        $this->trackNumber = $trackNumber;
        $this->duration = $duration;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getArtist() { return $this->artist; }
    public function getTrackNumber() { return $this->trackNumber; }
    public function getDuration() { return $this->duration; }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'artist' => $this->artist,
            'trackNumber' => $this->trackNumber,
            'duration' => $this->duration,
        ];
    }
}

class OST implements JsonSerializable {
    private $id;
    private $name;
    private $videoGameName;
    private $releaseYear;
    private $trackList = [];

    public function __construct($id, $name, $videoGameName, $releaseYear) {
        $this->id = $id;
        $this->name = $name;
        $this->videoGameName = $videoGameName;
        $this->releaseYear = $releaseYear;
    }

    public function addTrack(Song $song) {
        $this->trackList[] = $song;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getVideoGameName() { return $this->videoGameName; }
    public function getReleaseYear() { return $this->releaseYear; }
    public function getTrackList() { return $this->trackList; }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'videoGameName' => $this->videoGameName,
            'releaseYear' => $this->releaseYear,
            'trackList' => $this->trackList,
        ];
    }
}

?>
