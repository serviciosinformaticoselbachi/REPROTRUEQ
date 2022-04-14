<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>reproductor</title>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/lunaradio-sincors.js"></script>

<div id="lunaradio" style="width:100%; height:100%;background: #000000 url(js/portada.jpg) bottom / cover no-repeat;">loading...</div>			

<script>
$("#lunaradio").lunaradio({
userinterface: "big", 
backgroundcolor: "",
fontcolor: "#ffffff",
hightlightcolor: "#610094", 
fontname: "Unica One", 
googlefont: "Unica+One&display=swap", 
fontratio: "0.4", 
radioname: "Bachi Streaming", 
scroll: "true", 
coverimage: "js/logo.jpg",
onlycoverimage: "false",
coverstyle: "animated",
usevisualizer: "real", 
visualizertype: "4", 
metadatatechnic: "",
ownmetadataurl: "", 
streamurl: "https://sonic.tvcontrolcp.com:8210", 
streamtype: "icecast2", 
icecastmountpoint: "/live",
shoutcastpath: "/stream",
shoutcastid: "1", 
streamsuffix: "", 
radionomyid: "", 
radionomyapikey: "",
radiojarid: "",  
radiocoid: "",
itunestoken: "1000lIPN", 
metadatainterval: "5000", 
volume: "100",
debug: "false",
autoplay: "true"
});
</script>
 </head>
  <body>
    <img src="images/firefox-icon.png" alt="Mi imagen de prueba">
  </body>
</html>
