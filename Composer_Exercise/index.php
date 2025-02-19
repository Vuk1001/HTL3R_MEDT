<?php

require_once '../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

$example = new Builder(
    writer: new PngWriter(),
    writerOptions: [],
    validateResult: false,
    data: "+43 1 22 33 444",
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 200,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    labelText: '+43 1 22 33 444',
    labelFont: new OpenSans(18),
    labelAlignment: LabelAlignment::Center
);
$result = $example->build();

$qr = null;
$out = null;
$doDisplayExample = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST["input"];

    if (!empty($num)) {


        $qr = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $num,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 200,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            labelText: $num,
            labelFont: new OpenSans(18),
            labelAlignment: LabelAlignment::Center
        );

        $out = $qr->build();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Code to Phone number</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1 style="text-align: center; font-size: xxx-large">Phone to QR-Code</h1>
<p style="text-align: center; font-size: xx-large">Example:</p>
<img src="<?php echo $result->getDataUri(); ?>" alt="QR" style="margin-left: auto; margin-right: auto; display: block;" id="example">
<form method="post">
    <label for="input">Input Your Phone Number: </label>
    <br><br>
    <input type="tel" placeholder="eg: +43 1 22 33 444" id="input" name="input" autofocus>
    <br><br>
    <button type="submit">Create</button>
</form>

<img src="<?php echo $out->getDataUri(); ?>" alt="qr" style="margin-left: auto; margin-right: auto; display: block;">

</body>
</html>
