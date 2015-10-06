
<div class="css-slideshow">
    <figure>
       <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
    </figure>
    <figure>
        <p>Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
    </figure>
    <figure>
       <p>Beginning with the Geolocation API, Web Applications can present rich, device-aware features and experiences. Incredible device access innovations are being developed and implemented, from audio/video input access to microphones and cameras, to local data such as contacts &amp; events, and even tilt orientation.</p>
    </figure>
    <figure>
        <p>More efficient connectivity means more real-time chats, faster games, and better communication. Web Sockets and Server-Sent Events are pushing (pun intended) data between client and server more efficiently than ever before</p>
    </figure>
	<figure>
        <p>Audio and video are first class citizens in the HTML5 web, living in harmony with your apps and sites. Lights, camera, action!</p>
    </figure>
   
  </div>  
<style type="text/css"> 
.css-slideshow{
  position: relative;
  max-width: 400px;
  height: 370px;
  margin: 5em auto .5em auto;
}
.css-slideshow figure{
  margin: 0;
  max-width: 400px;
  height: 200px;
  background: #fff;
  position: absolute;
}
.css-slideshow img{
  box-shadow: 0 0 2px #666;
}

.css-slideshow-attr{
  max-width: 495px;
  text-align: right;
  font-size: .7em;
  font-style: italic;
  margin:0 auto;
}
.css-slideshow-attr a{
  color: #666;
}
.css-slideshow figure{
  opacity:0;
}
figure:nth-child(1) {
  animation: xfade 48s 42s infinite;
}
figure:nth-child(2) {
  animation: xfade 48s 36s infinite;
}
figure:nth-child(3) {
  animation: xfade 48s 30s infinite;
}
figure:nth-child(4) {
  animation: xfade 48s 24s infinite;
}
figure:nth-child(5) {
  animation: xfade 48s 18s infinite;
}
figure:nth-child(6) {
  animation: xfade 48s 12s infinite;
}
figure:nth-child(7) {
  animation: xfade 48s 6s infinite;
}
figure:nth-child(8) {
  animation: xfade 48s 0s infinite;
}

@keyframes xfade{
  0%{
    opacity: 1;
  }
  10.5% {
    opacity: 1;
  }
  12.5%{
    opacity: 0;
  }
  98% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>