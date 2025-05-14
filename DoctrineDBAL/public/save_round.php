<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$playedAt = date('Y-m-d H:i:s');

$db = Connection::getInstance();

$db->insert('game_rounds', [
    'round_number' => $_POST['round_number'],
    'player_name' => $_POST['player1_name'],
    'player_symbol' => $_POST['player1_symbol'],
    'played_at' => $playedAt
]);

$db->insert('game_rounds', [
    'round_number' => $_POST['round_number'],
    'player_name' => $_POST['player2_name'],
    'player_symbol' => $_POST['player2_symbol'],
    'played_at' => $playedAt
]);

header('Location: /');
exit();
