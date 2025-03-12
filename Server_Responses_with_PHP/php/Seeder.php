<?php

require_once 'OST.php';

class Seeder {
    public static function seed() {
        $ost1 = new OST(1, "Final Fantasy OST", "Final Fantasy", 1987);
        $ost1->addTrack(new Song(1, "Prelude", "Nobuo Uematsu", 1, "2:10"));
        $ost1->addTrack(new Song(2, "Opening Theme", "Nobuo Uematsu", 2, "3:30"));
        $ost1->addTrack(new Song(3, "Victory Fanfare", "Nobuo Uematsu", 3, "1:20"));
        $ost1->addTrack(new Song(4, "Main Theme", "Nobuo Uematsu", 4, "4:00"));

        $ost2 = new OST(2, "The Legend of Zelda OST", "The Legend of Zelda", 1986);
        $ost2->addTrack(new Song(5, "Overworld Theme", "Koji Kondo", 1, "2:00"));
        $ost2->addTrack(new Song(6, "Dungeon Theme", "Koji Kondo", 2, "1:40"));
        $ost2->addTrack(new Song(7, "End Theme", "Koji Kondo", 3, "2:30"));
        $ost2->addTrack(new Song(8, "Title Theme", "Koji Kondo", 4, "1:50"));

        $ost3 = new OST(3, "Mega Man 2 OST", "Mega Man 2", 1988);
        $ost3->addTrack(new Song(9, "Dr. Wily Stage 1", "Takashi Tateishi", 1, "3:05"));
        $ost3->addTrack(new Song(10, "Title Theme", "Takashi Tateishi", 2, "2:50"));
        $ost3->addTrack(new Song(11, "Air Man Stage", "Takashi Tateishi", 3, "2:20"));
        $ost3->addTrack(new Song(12, "Crash Man Stage", "Takashi Tateishi", 4, "2:10"));

        return [$ost1, $ost2, $ost3];
    }
}

?>
