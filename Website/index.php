<?php

require_once 'php/YouTubeVideo.php';
require_once 'php/VimeoVideo.php';

$videos = [
    new YouTubeVideo('Funny Horror Trailer', '46WZfo1yFkI?si'),
    new YouTubeVideo('Scary Comedy Clip', 'ooHiFoWz50U?si'),
    new YouTubeVideo('Horror Spoof 1', 'dIV9H1_CCk0?si'),
    new YouTubeVideo('Horror Spoof 2', 'd4y0GlZEikQ?si'),
    new YouTubeVideo('Zombie Comedy Clip', '6iotcc-xXu8?si'),
    new VimeoVideo('Scary Movie 3 Trailer', '153724554'),
    new VimeoVideo('Teletubbies Horror Trailer', '202696600'),
    new VimeoVideo('Witch Tales Trailer', '450858469'),
    new VimeoVideo('FNAF gameplay', '146903318'),
    new VimeoVideo('spooky scary skeletons', '236636441')


];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror Movie Trailers</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Horror Movie Trailers</h1>
    <div class="video-container">
        <?php
        foreach ($videos as $video) {
            echo '<div class="video-entry">';
            echo '<h2>' . $video->getName() . '</h2>';
            echo '<p>Source: ' . $video->getSource() . '</p>';
            echo $video->getEmbedCode();
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>