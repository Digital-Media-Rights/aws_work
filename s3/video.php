<?php

require 'app/start.php';
$object = '$100_AND_A_T-SHIRT_PR_4x3_2997_NOSUB-ZYPE-4x3-SD2.mp4';
$expiry = new DateTime('+10 minutes');

$url = $cloudfront->getSignedUrl([
    'url' => "{$config['cloudfront']['url']}/{$object}",
    'expires' => $expiry->getTimestamp()
]);



?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video</title>
</head>

<body>
    <video controls width="768">
        <source src="<?php echo $url;?>" type="video/mp4">
    </video>
</body>
</html>
