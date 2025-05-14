<?php
require_once __DIR__.'/../db/bootstrap.php';
use Nicki\DoctrineDbal\Database\Connection;

$db = Connection::getInstance();

$db->executeStatement(
    "DELETE FROM game_rounds WHERE round_number = ?",
    [$_POST['round_number']]
);

header('Location: /');
exit();

