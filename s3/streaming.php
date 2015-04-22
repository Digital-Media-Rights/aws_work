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



<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Smooth Streaming Player</title>
    </head>
    <body>
    <form id="form1" runat="server" style="height:100%">
        <div id="silverlightControlHost">
        <object data="data:application/x-silverlight-2," type="application/x-silverlight-2" width="100%" height="100%">
        <param name="source" value="SmoothStreamingPlayer.xap"/>
        <param name="minRuntimeVersion" value="4.0.50401.0"/>
        <param name="autoUpgrade" value="true"/>
        <param name="InitParams" value="mediaurl= <?php echo $url;?>"/>
        </object>
        </div>
     </form>
    </body>
    </html>