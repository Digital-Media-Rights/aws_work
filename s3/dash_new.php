<?php

require 'app/start.php';
$object = 'breadth_of_a_woman.mpd';
$expiry = new DateTime('+10 minutes');

$url = $cloudfront->getSignedUrl([
    'url' => "{$config['cloudfront']['url']}/breadth_of_a_woman/{$object}",
    'expires' => $expiry->getTimestamp()
]);


echo $url;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Baseline Dash JavaScript Player</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/png" href="http://dashpg.com/w/2012/09/dashif.ico" />

    <!-- Libraries - Include these libraries only when using the dash.min.js version. The dash.all.js version includes the libraries. -->
    <!--
    <script src="../../src/lib/dijon.js"></script>
    <script src="../../src/lib/xml2json.js"></script>
    <script src="../../src/lib/objectiron.js"></script>
    <script src="../../src/lib/long.js"></script>
    <script src="../../src/lib/Math.js"></script>
    -->

    <!-- Minified Dash -->
    <!--<script src="../../dist/dash.min.js"></script>-->

    <!-- Minified Dash & Libraries -->
    <!--script src="../../dist/dash.all.js"></script-->

	<!-- Concatenated Dash & Libraries -->
	<script src="js/dash.all.js"></script>

    <script>
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                vars[key] = value;
            });
            return vars;
        }

        function startVideo() {
            var vars = getUrlVars(),
                url = "<?php echo $url; ?>",
                video,
                context,
                player,
                autoplay = false;

            if (vars && vars.hasOwnProperty("url")) {
                url = vars.url;
            }
            if (vars && vars.hasOwnProperty("autoplay")) {
                autoplay = (vars.autoplay == "true");
            }

            video = document.querySelector(".dash-video-player video");
            context = new Dash.di.DashContext();
            player = new MediaPlayer(context);

            player.startup();

            player.attachView(video);
            player.setAutoPlay(autoplay);

            player.attachSource(url);
        }
    </script>

    <style>
        video {
            width: 640px;
            height: 480px;
        }
    </style>

    <body onload="startVideo()">
        <div class="dash-video-player">
            <video controls="true"></video>
        </div>
    </body>
</html>
