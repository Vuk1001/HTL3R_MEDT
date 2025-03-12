<?php
$templateFile = 'template.html';
if (!file_exists($templateFile)) {
    die("Template file not found.");
}

$fp = fopen($templateFile, 'r');
$templateContent = fread($fp, filesize($templateFile));
fclose($fp);

$hotels = [
    [
        'hotel_name' => 'HTL Rennweg',
        'hotel_description' => 'A little uncomfortable but warm.',
        'hotel_rating' => '2.5 Stars',
        'hotel_image' => 'images/htl_rennweg.jpg'
    ],
    [
        'hotel_name' => 'Reumannplatz',
        'hotel_description' => 'Scary, wouldnt recommend',
        'hotel_rating' => '1 Star',
        'hotel_image' => 'images/reumannplatz.jpg'
    ],
    [
        'hotel_name' => 'McDonalds Stephansplatz',
        'hotel_description' => 'Tasty but mean. They kicked me out.',
        'hotel_rating' => '3 Stars',
        'hotel_image' => 'images/mcdonalds.jpg'
    ],
    [
        'hotel_name' => 'Sigma Nation Gaming',
        'hotel_description' => 'English video talk for 10 minutes.',
        'hotel_rating' => '5 Stars',
        'hotel_image' => 'images/sigma_nation.jpg'
    ]
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
        foreach ($hotel as $key => $value) {
            $currentBlock = str_replace('{{' . $key . '}}', $value, $currentBlock);
        }
        $hotelOutput .= $currentBlock;
    }

    $templateContent = substr_replace($templateContent, $hotelOutput, $startPos, $endPos - $startPos);
    $templateContent = str_replace([$loopStartTag, $loopEndTag], '', $templateContent);
}

echo $templateContent;
?>
