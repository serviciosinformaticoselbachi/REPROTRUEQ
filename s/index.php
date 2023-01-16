<!doctype html>
<html lang="es">
<head>

<meta charset="utf-8">
<title>SIENTEME FM</title>
<meta name="theme-color" content="#3811D4">
</head>
<body>
<link href="css/redes.css" rel="stylesheet" type="text/css">

<style type="text/css">

.fs-vid-background {
    position: absolute;
    width: 100%;
    height: 100%;
    margin: 0 0;
    z-index: 250;
}
.fs-vid-background video {
    object-fit: cover;
    width: 100%;
    height: 100%;
}
video {
    max-width: 100%;
}
#capa1{ 

 background-color:transparent;
 position: relative;
 display: flex;
 height: 16vh;
 align-items: center;
 justify-content: center;
 margin: -1px auto;
 left: -2px;	
 z-index: 300;
}	
</style>
<div class="fs-vid-background">
  <video autoplay="true" muted="true" loop="true">
    <source src="https://pkdo.eskuchame.com/video/home.mp4" type="video/mp4">
  </video>
</div>	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/lunaradio-sincors.js"></script>

<div id="lunaradio" style="width:100%; height: 100%; position: absolute; left:0; top:0; z-index: 300; ">
</div>			

<script>
$("#lunaradio").lunaradio({
userinterface: "big", 
backgroundcolor: "",
fontcolor: "#ffffff",
hightlightcolor: "#610094", 
fontname: "Unica One", 
googlefont: "Unica+One&display=swap", 
fontratio: "0.4", 
radioname: "SIENTEME FM", 
scroll: "true", 
coverimage: "sonic_art",
onlycoverimage: "false",
coverstyle: "animated",
usevisualizer: "real", 
visualizertype: "4", 
metadatatechnic: "",
ownmetadataurl: "", 
streamurl: "https://sonic.tvcontrolcp.com:10953", 
streamtype: "shoutcast2", 
icecastmountpoint: "",
shoutcastpath: "/stream",
shoutcastid: "1", 
streamsuffix: "", 
radionomyid: "'sonic_art'", 
radionomyapikey: "",
radiojarid: "'sonic_title'",  
radiocoid: "'sonic_art'",
itunestoken: "1000lIPN", 
metadatainterval: "5000", 
volume: "100",
debug: "false",
autoplay: "true"
});
</script>