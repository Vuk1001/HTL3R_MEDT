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
            padding: 0;
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
        pre {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            max-width: 100%;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<h1>OST API Testseite</h1>

<h2>Alle OSTs abrufen</h2>
<a href="api.php" target="_blank">Alle OSTs abrufen</a>

<h2>Spezifische OST nach ID abrufen</h2>
<form action="index.php" method="GET">
    <label for="id">OST ID eingeben:</label>
    <input type="number" name="id" id="id" min="1" required>
    <button type="submit">OST abrufen</button>
</form>

<h2>Ergebnis</h2>
<div id="results">
    <?php
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $url = "http://localhost/dev.webt.local/public_html/api.php?id=" . $id;

        // Abrufen der API-Ergebnisse
        $jsonData = @file_get_contents($url);

        if ($jsonData !== false) {
            echo '<pre>' . htmlspecialchars($jsonData) . '</pre>';
        } else {
            echo '<p>Fehler: Die API konnte nicht erreicht werden oder es wurden keine Daten zurückgegeben.</p>';
        }
    }
    ?>
</div>

</body>
</html>
