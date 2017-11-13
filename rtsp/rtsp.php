<!DOCTYPE html>
<html>
<title>VLC Mozilla plugin test page</title>
<body>
<embed type="application/x-vlc-plugin" pluginspage="http://www.videolan.org"
   width="320"
   height="240"
   target="rtsp://admin:admin1234@697c05d98444.sn.mynetname.net/Streaming/Channels/101"
   id="vlc" />
<script type="text/javascript">
<!--
var vlc = document.getElementById("vlc");
// vlc.audio.toggleMute();
//-->
</script>
</body>
</html>
