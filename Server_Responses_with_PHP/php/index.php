<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OST API Tester</title>
    <!-- Custom CSS (if using SASS) -->
    <link href="dist/css/main.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4">OST API Testseite</h1>

    <!-- Form to fetch OST by ID -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Spezifischen OST nach ID abrufen</h2>
            <form action="index.php" method="GET" class="row g-3">
                <div class="col-auto">
                    <label for="id" class="form-label">OST ID eingeben:</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="id" id="id" class="form-control" min="1" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">OST abrufen</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Link to fetch all OSTs -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Alle OSTs anzeigen</h2>
            <a href="index.php?all=true" class="btn btn-primary">Alle OSTs anzeigen</a>
        </div>
    </div>

    <!-- Results Section -->
    <h2 class="mb-3">Ergebnis</h2>
    <div id="results">
        <?php
        if (isset($_GET['id']) || isset($_GET['all'])) {
            require_once 'OST.php';
            require_once 'Seeder.php';

            $osts = Seeder::seed();

            function displayOST($ost) {
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . htmlspecialchars($ost->getName()) . ' (' . htmlspecialchars($ost->getVideoGameName()) . ' - ' . htmlspecialchars($ost->getReleaseYear()) . ')</h3>';
                echo '<p class="card-text"><strong>OST ID:</strong> ' . htmlspecialchars($ost->getId()) . '</p>';
                echo '<h4>Trackliste:</h4>';
                echo '<ul class="list-group">';
                foreach ($ost->getTrackList() as $track) {
                    echo '<li class="list-group-item">';
                    echo '<strong>Track ' . htmlspecialchars($track->getTrackNumber()) . ':</strong> ' . htmlspecialchars($track->getName()) . '<br>';
                    echo '<strong>Artist:</strong> ' . htmlspecialchars($track->getArtist()) . '<br>';
                    echo '<strong>Dauer:</strong> ' . htmlspecialchars($track->getDuration());
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
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
                    echo '<div class="alert alert-danger">Fehler: OST mit der ID ' . htmlspecialchars($id) . ' wurde nicht gefunden.</div>';
                }
            } else {
                foreach ($osts as $ost) {
                    displayOST($ost);
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>