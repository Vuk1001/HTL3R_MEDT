<?php
class Song {
    private int $id;
    private string $name;
    private string $artist;
    private int $trackNumber;
    private string $duration;

    public function __construct(int $id, string $name, string $artist, int $trackNumber, string $duration) {
        $this->id = $id;
        $this->name = $name;
        $this->artist = $artist;
        $this->trackNumber = $trackNumber;
        $this->duration = $duration;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'artist' => $this->artist,
            'trackNumber' => $this->trackNumber,
            'duration' => $this->duration
        ];
    }
}

class OST {
    private int $id;
    private string $name;
    private string $videoGame;
    private int $releaseYear;
    private array $trackList = [];

    public function __construct(int $id, string $name, string $videoGame, int $releaseYear) {
        $this->id = $id;
        $this->name = $name;
        $this->videoGame = $videoGame;
        $this->releaseYear = $releaseYear;
    }

    public function addSong(Song $song): void {
        $this->trackList[] = $song;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'videoGame' => $this->videoGame,
            'releaseYear' => $this->releaseYear,
            'trackList' => array_map(fn(Song $song): array => $song->toArray(), $this->trackList)
        ];
    }
}
?>
