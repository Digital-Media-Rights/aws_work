<?php

require 'app/start.php';
$object = 'breadth_of_a_woman.ism';
$expiry = new DateTime('+10 minutes');

$url = $cloudfront->getSignedUrl([
    'url' => "{$config['cloudfront']['url']}/breadth_of_a_woman.ism/{$object}/Manifest",
    'expires' => $expiry->getTimestamp()
]);

//$url="http://mediadl.microsoft.com/mediadl/iisnet/smoothmedia/Experience/BigBuckBunny_720p.ism/Manifest";

echo $url;
?>

<style>
video {
  width: 80%;
  height: 80%;
}
</style>

<!-- DASH-AVC/265 reference implementation -->
<script src="js/dash.all.js"></script>

<script>
// setup the video element and attach it to the Dash player
function setupVideo() {
  var url = "http://wams.edgesuite.net/media/MPTExpressionData02/BigBuckBunny_1080p24_IYUV_2ch.ism/manifest(format=mpd-time-csf)";
  var context = new Dash.di.DashContext();
  var player = new MediaPlayer(context);
                  player.startup();
                  player.attachView(document.querySelector("#videoplayer"));
                  player.attachSource(url);
}
</script>

<!DOCTYPE html>
<html>
  <head><title>Adaptive Streaming in HTML5</title></head>
  <body onload="setupVideo()">
    <h1>Adaptive Streaming with HTML5</h1>
    <video id="videoplayer" controls></video>
  </body>
</html>