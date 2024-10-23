<?php
require_once 'Seeder.php'; // Stelle sicher, dass dies den korrekten Pfad hat

// Funktion zur Rückgabe von JSON
function respondWithJson(array $data): void {
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Parameter abrufen
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Daten seeden
$osts = Seeder::seed();

// Eine spezifische OST abrufen
if ($id !== null) {
    foreach ($osts as $ost) {
        if ($ost->toArray()['id'] === $id) {
            respondWithJson($ost->toArray());
            exit;
        }
    }
    // Fehler, falls OST nicht gefunden wird
    respondWithJson(['error' => 'OST not found']);
    exit;
}

// Alle OSTs abrufen
if (!isset($_GET['id'])) {
    $allOsts = array_map(fn($ost) => $ost->toArray(), $osts);
    respondWithJson($allOsts);
    exit;
}
