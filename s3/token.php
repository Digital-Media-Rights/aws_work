<?php

require 'app/start.php';
$object = 'uploads/uploadme.txt';
$url = $s3->getObjectUrl($config['s3']['bucket'], $object,'+1 day');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html lang="eng">
<head>
    <title>Permissions</title>
</head>

<body>
    <a href="<?php echo $url ?>">Download</a>
</body>
</html>
