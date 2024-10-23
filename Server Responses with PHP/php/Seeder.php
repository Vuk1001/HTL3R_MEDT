<?php
require_once 'OST.php';  // Stelle sicher, dass dies den korrekten Pfad hat

class Seeder {
    public static function seed(): array {
        $osts = [];

        // Erstellen des ersten OST
        $ost1 = new OST(1, "Game OST 1", "Retro Game 1", 1995);
        $ost1->addSong(new Song(1, "Song 1", "Artist 1", 1, "3:20"));
        $ost1->addSong(new Song(2, "Song 2", "Artist 2", 2, "4:15"));
        $ost1->addSong(new Song(3, "Song 3", "Artist 1", 3, "2:45"));
        $ost1->addSong(new Song(4, "Song 4", "Artist 3", 4, "5:00"));
        $osts[] = $ost1;

        // Erstellen des zweiten OST
        $ost2 = new OST(2, "Game OST 2", "Retro Game 2", 2001);
        $ost2->addSong(new Song(5, "Song 5", "Artist 4", 1, "3:00"));
        $ost2->addSong(new Song(6, "Song 6", "Artist 2", 2, "3:45"));
        $ost2->addSong(new Song(7, "Song 7", "Artist 5", 3, "4:30"));
        $ost2->addSong(new Song(8, "Song 8", "Artist 6", 4, "3:50"));
        $osts[] = $ost2;

        // Erstellen des dritten OST
        $ost3 = new OST(3, "Game OST 3", "Retro Game 3", 2010);
        $ost3->addSong(new Song(9, "Song 9", "Artist 7", 1, "4:10"));
        $ost3->addSong(new Song(10, "Song 10", "Artist 8", 2, "3:20"));
        $ost3->addSong(new Song(11, "Song 11", "Artist 9", 3, "5:10"));
        $ost3->addSong(new Song(12, "Song 12", "Artist 7", 4, "2:40"));
        $osts[] = $ost3;

        return $osts;
    }
}
