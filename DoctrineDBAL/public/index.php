<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$db = Connection::getInstance();

$roundsData = $db->fetchAllAssociative('
    SELECT * FROM game_rounds 
    ORDER BY round_number, played_at
');

$groupedRounds = [];
foreach ($roundsData as $round) {
    $groupedRounds[$round['round_number']][] = $round;
}

include __DIR__.'/../templates/rps.html';
