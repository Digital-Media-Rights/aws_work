<?php

require '../s3/app/start.php';
$object = 'breadth_of_a_woman.mpd';
$expiry = new DateTime('+10 minutes');

$url = $cloudfront->getSignedUrl([
    'url' => "{$config['cloudfront']['url']}/breadth_of_a_woman/{$object}",
    'expires' => $expiry->getTimestamp()
]);


echo $url
?>




<!DOCTYPE html>
<!--
*
* Copyright (C) 2014, bitmovin GmbH, All Rights Reserved
*
* Created on: 2015-02-06 14:00:00
* Author:     bitmovin GmbH <dash-player@bitmovin.net>
*
* This source code and its use and distribution, is subject to the terms
* and conditions of the applicable license agreement.
*
-->
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- bitdash player -->
    <script type="text/javascript" src="../bitdash.min.js"></script>

  </head>
  <body>
    <center>
      <h1>Demo Page for d3naaeloyps2sq.cloudfront.net</h1>
      <div id="wrapper">
        <div id="player"></div>
      </div>
    </center>
    <script type="text/javascript">
      var conf = {
        key:       "df23ac4693b582c770a8f6b5702a6273",
        source:    {
          mpd:       "<?php echo $url?>"
         // mobilempd: "http://bitcdn-global1.bitmovin.com/content/sintel/sintel-mobile.mpd",
         // hls:       "http://bitcdn-global1.bitmovin.com/content/sintel/hls/playlist.m3u8",
         // poster:    "sintel-poster.png"
        },
        playback: {
          autoplay:  true,
          muted:     false
        },
        style: {
          width: '600px',
          height: '250px'
        },
        events: {
          onError: function(data) { 
            console.error("bitdash error: " + data.code + ": " + data.message);
          },
          onReady: function(obj)  { 
            console.log(this.getVersion() + ' onReady: ', obj);
          }
        }
      };

      var player = bitdash("player").setup(conf);
    </script>
  </body>
</html>
