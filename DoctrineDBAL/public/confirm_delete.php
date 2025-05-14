<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

// Get round number from URL
$roundNumber = $_GET['round'] ?? 0;

// Get database connection
$db = Connection::getInstance();

// Get players for this round
$players = $db->fetchAllAssociative(
    "SELECT * FROM game_rounds WHERE round_number = ? ORDER BY played_at",
    [$roundNumber]
);

// Show confirmation page
include __DIR__.'/../templates/delete_round.html';
