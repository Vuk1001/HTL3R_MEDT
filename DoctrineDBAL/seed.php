<?php
require_once __DIR__.'/vendor/autoload.php';

require_once __DIR__.'/db/bootstrap.php';

use Nicki\DoctrineDbal\Entity\Round;
use Nicki\DoctrineDbal\Database\Connection;
$db = Nicki\DoctrineDbal\Database\Connection::getInstance();

$db->executeQuery("DELETE FROM game_rounds");

$rounds = [
    new Round("Rock Paper Scissors", "2025-04-09", 1, "Vuk", "rock", "2025-04-09 03:00:00"),
    new Round("Rock Paper Scissors", "2025-04-09", 1, "Nick", "paper", "2025-04-09 03:00:00"),
    new Round("Rock Paper Scissors", "2025-04-09", 2, "Bob", "scissors", "2025-04-09 03:01:00"),
    new Round("Rock Paper Scissors", "2025-04-09", 2, "Alice", "rock", "2025-04-09 03:01:00"),
    new Round("Rock Paper Scissors", "2025-04-09", 3, "John", "paper", "2025-04-09 03:02:00"),
    new Round("Rock Paper Scissors", "2025-04-09", 3, "Jane", "scissors", "2025-04-09 03:02:00"),
];

foreach ($rounds as $round) {
    $db->insert('game_rounds', [
        'tournament_name' => $round->tournamentName,
        'tournament_date' => $round->tournamentDate,
        'round_number' => $round->roundNumber,
        'player_name' => $round->playerName,
        'player_symbol' => $round->playerSymbol,
        'played_at' => $round->playedAt
    ]);
}

echo "Added " . count($rounds) . " rounds to database!\n";