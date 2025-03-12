<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OST API Tester</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label, input {
            font-size: 1.1em;
        }
        input[type="number"] {
            padding: 5px;
            margin-right: 10px;
            width: 60px;
        }
        button {
            padding: 6px 12px;
            font-size: 1.1em;
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .ost {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            margin-bottom: 20px;
        }
        .ost h3 {
            margin-top: 0;
        }
        .track-list {
            list-style-type: none;
            padding: 0;
        }
        .track-list li {
            background-color: #e9ecef;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 3px;
        }
        .track-list li:nth-child(odd) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<h1>OST API Testseite</h1>

<h2>Spezifischen OST nach ID abrufen</h2>
<form action="index.php" method="GET">
    <label for="id">OST ID eingeben:</label>
    <input type="number" name="id" id="id" min="1" required>
    <button type="submit">OST abrufen</button>
</form>

<h2>Alle OSTs anzeigen</h2>
<a href="index.php?all=true">Alle OSTs anzeigen</a>

<h2>Ergebnis</h2>
<div id="results">
    <?php
    if (isset($_GET['id']) || isset($_GET['all'])) {
        require_once 'OST.php';
        require_once 'Seeder.php';

        $osts = Seeder::seed();

        function displayOST($ost) {
            echo '<div class="ost">';
            echo '<h3>' . htmlspecialchars($ost->getName()) . ' (' . htmlspecialchars($ost->getVideoGameName()) . ' - ' . htmlspecialchars($ost->getReleaseYear()) . ')</h3>';
            echo '<p><strong>OST ID:</strong> ' . htmlspecialchars($ost->getId()) . '</p>';
            echo '<h4>Trackliste:</h4>';
            echo '<ul class="track-list">';
            foreach ($ost->getTrackList() as $track) {
                echo '<li>';
                echo '<strong>Track ' . htmlspecialchars($track->getTrackNumber()) . ':</strong> ' . htmlspecialchars($track->getName()) . '<br>';
                echo '<strong>Artist:</strong> ' . htmlspecialchars($track->getArtist()) . '<br>';
                echo '<strong>Dauer:</strong> ' . htmlspecialchars($track->getDuration());
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }

        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $found = false;

            foreach ($osts as $ost) {
                if ($ost->getId() === $id) {
                    $found = true;
                    displayOST($ost);
                    break;
                }
            }

            if (!$found) {
                echo '<p>Fehler: OST mit der ID ' . htmlspecialchars($id) . ' wurde nicht gefunden.</p>';
            }
        } else {
            foreach ($osts as $ost) {
                displayOST($ost);
            }
        }
    }
    ?>
</div>

</body>
</html>
