<?php

require 'app/start.php';
$object = 'uploads/uploadme.txt';
$url = $s3->getObjectUrl($config['s3']['bucket'], $object,'+1 day');

?>


<html lang="eng">
<head>
    <title>Permissions</title>
</head>

<body>
    <a href="<?php echo $url ?>">Download</a>
</body>
</html>