<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$db = Connection::getInstance();

$queryBuilder = $db->createQueryBuilder();
$roundsData = $queryBuilder
    ->select('*')
    ->from('game_rounds')
    ->orderBy('round_number')
    ->fetchAllAssociative();

$groupedRounds = [];
foreach ($roundsData as $round) {
    $groupedRounds[$round['round_number']][] = $round;
}

include __DIR__.'/../templates/rps.html';