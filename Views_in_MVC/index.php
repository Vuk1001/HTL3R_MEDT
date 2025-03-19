<?php
require_once 'vendor/autoload.php';
use Nicki\ViewsInMvc\Entity\Hotel;

$templateFile = 'template.html';
if (!file_exists($templateFile)) {
    die("Template file not found.");
}

$fp = fopen($templateFile, 'r');
$templateContent = fread($fp, filesize($templateFile));
fclose($fp);

$hotels = [
    new Hotel('HTL Rennweg', 'A little uncomfortable but warm.', '2.5 Stars', 'images/htl_rennweg.jpg'),
    new Hotel('Reumannplatz', 'Scary, wouldn\'t recommend', '1 Star', 'images/reumannplatz.jpg'),
    new Hotel('McDonalds Stephansplatz', 'Tasty but mean. They kicked me out.', '3 Stars', 'images/mcdonalds.jpg'),
    new Hotel('Sigma Nation Gaming', 'English video talk for 10 minutes.', '5 Stars', 'images/sigma_nation.jpg'),
    new Hotel('Sigma Nation Gaming', 'English video talk for 10 minutes.', '5 Stars', '')
];

$loopStartTag = '<!-- START_HOTEL_LOOP -->';
$loopEndTag   = '<!-- END_HOTEL_LOOP -->';

$startPos = strpos($templateContent, $loopStartTag);
$endPos   = strpos($templateContent, $loopEndTag);

if ($startPos !== false && $endPos !== false) {
    $startPos += strlen($loopStartTag);
    $loopBlock = substr($templateContent, $startPos, $endPos - $startPos);

    $hotelOutput = '';

    foreach ($hotels as $hotel) {
        $currentBlock = $loopBlock;
        $currentBlock = str_replace('{{hotel_name}}', $hotel->name, $currentBlock);
        $currentBlock = str_replace('{{hotel_description}}', $hotel->description, $currentBlock);
        $currentBlock = str_replace('{{hotel_rating}}', $hotel->rating, $currentBlock);
        $currentBlock = str_replace('{{hotel_image}}', $hotel->image, $currentBlock);

        $hotelOutput .= $currentBlock;
    }

    $templateContent = substr_replace($templateContent, $hotelOutput, $startPos, $endPos - $startPos);
    $templateContent = str_replace([$loopStartTag, $loopEndTag], '', $templateContent);
}

echo $templateContent;
?>