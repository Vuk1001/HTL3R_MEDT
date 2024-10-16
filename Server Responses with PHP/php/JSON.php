<?php
require 'Seeder.php';


function respondWithJson(array $data): void {
    header('Content-Type: application/json');
    echo json_encode($data);
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$osts = Seeder::seed();

if ($id !== null) {
    foreach ($osts as $ost) {
        if ($ost->toArray()['id'] === $id) {
            respondWithJson($ost->toArray());
            exit;
        }
    }
    respondWithJson(['error' => 'OST not found']);
    exit;
}

if (!isset($_GET['id'])) {
    $allOsts = array_map(fn(OST $ost): array => $ost->toArray(), $osts);
    respondWithJson($allOsts);
    exit;
}
?>
