<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$db = Connection::getInstance();

$queryBuilder = $db->createQueryBuilder();

$queryBuilder
    ->delete('game_rounds')
    ->where('round_number = :roundNumber')
    ->setParameter('roundNumber', $_POST['round_number'])
    ->executeStatement();

header('Location: /');
exit();
