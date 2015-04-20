<?php

require 'app/start.php';
$objects = $s3->getIterator('ListObjects', [
                               'Bucket' => $config['s3']['bucket']
                            ])

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listing</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>File</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($objects as $object):?>
            <tr>
                <td><?php echo $object['Key'];?></td>
                <td><a href="<?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']);?>" download="<?php $object['Key']?>">Download</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
