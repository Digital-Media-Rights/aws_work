<?php

 use Aws\S3\S3Client;
 use Aws\CloudFront\CloudFrontClient;
 

 require '../s3/vendor/autoload.php';
 $config = require('config.php');
 
 //s3
 $s3 = S3Client::factory([
    'key' => $config['s3']['key'],
    'secret' => $config['s3']['secret']
    
 ]);
 
 //Cloudfront
 $cloudfront = CloudFrontClient::factory([
    'private_key'=>'../s3/pk-APKAJ73YE5THUYNW4ZLQ.pem',
    'key_pair_id' => 'APKAJ73YE5THUYNW4ZLQ' 
 ])
 

?>



    