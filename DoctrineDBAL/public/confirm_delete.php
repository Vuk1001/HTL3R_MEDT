<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$roundNumber = $_GET['round'] ?? 0;

$db = Connection::getInstance();

$queryBuilder = $db->createQueryBuilder();

$players = $queryBuilder
    ->select('*')
    ->from('game_rounds')
    ->where('round_number = :roundNumber')
    ->orderBy('played_at')
    ->setParameter('roundNumber', $roundNumber)
    ->fetchAllAssociative();

include __DIR__.'/../templates/delete_round.html';
