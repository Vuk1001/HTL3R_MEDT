<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$playedAt = date('Y-m-d H:i:s');

$db = Connection::getInstance();

$roundNumber = $_POST['round_number'];

$db->createQueryBuilder()
    ->insert('game_rounds')
    ->values([
        'round_number' => ':round_number',
        'player_name' => ':player1_name',
        'player_symbol' => ':player1_symbol',
        'played_at' => ':played_at'
    ])
    ->setParameters([
        'round_number' => $roundNumber,
        'player1_name' => $_POST['player1_name'],
        'player1_symbol' => $_POST['player1_symbol'],
        'played_at' => $playedAt
    ])
    ->executeStatement();


$db->createQueryBuilder()
    ->insert('game_rounds')
    ->values([
        'round_number' => ':round_number',
        'player_name' => ':player2_name',
        'player_symbol' => ':player2_symbol',
        'played_at' => ':played_at'
    ])
    ->setParameters([
        'round_number' => $roundNumber,
        'player2_name' => $_POST['player2_name'],
        'player2_symbol' => $_POST['player2_symbol'],
        'played_at' => $playedAt
    ])
    ->executeStatement();

header('Location: /');
exit();
