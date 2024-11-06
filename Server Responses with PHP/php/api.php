<?php

require_once 'Seeder.php';

ob_start();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $osts = Seeder::seed();
    $found = false;

    foreach ($osts as $ost) {
        if ($ost->getId() === $id) {
            $found = true;
            header('Content-Type: application/json');
            echo json_encode($ost, JSON_PRETTY_PRINT);
            break;
        }
    }

    if (!$found) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'OST not found'], JSON_PRETTY_PRINT);
    }
} else {
    $osts = Seeder::seed();
    header('Content-Type: application/json');
    echo json_encode($osts, JSON_PRETTY_PRINT);
}

ob_end_flush();

?>
