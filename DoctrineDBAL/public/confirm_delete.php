<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$roundNumber = $_GET['round'] ?? 0;

$db = Connection::getInstance();

$players = $db->fetchAllAssociative(
    "SELECT * FROM game_rounds WHERE round_number = ? ORDER BY played_at",
    [$roundNumber]
);

include __DIR__.'/../templates/delete_round.html';
