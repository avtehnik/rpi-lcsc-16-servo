<html slick-uniqueid="3"><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type="text/javascript" src="http://fiddle.jshell.net/js/lib/mootools-core-1.4.5-compat.js"></script>
  
  
  
  <script type="text/javascript" src="http://fiddle.jshell.net/js/lib/mootools-more-1.4.0.1-compat.js"></script>


<script type="text/javascript">//<![CDATA[ 
window.addEvent('domready', function() {

function setPosition(servo, position) {
    var pw = parseInt(position);
    if (pw < 1000) {
        pw = '0' + pw;
    }
    new Request.JSONP({
        url: 'http://192.168.1.5:81/?servo=' + servo + '&position=' + pw
    }).send();
}
var servos = document.getElements('.servo');
servos.each(function (input) {
    input.addEvent('change', function () {
        setPosition(input.get('name'), input.get('value'));
    });
});

});
</script>
</head>
<body>
<input class="servo" type="range" name="1" min="600" max="2500">
<input class="servo" type="range" name="2" min="600" max="2500">
<input class="servo" type="range" name="3" min="600" max="2500">
<input class="servo" type="range" name="4" min="600" max="2500">
<input class="servo" type="range" name="5" min="600" max="2500">
<input class="servo" type="range" name="6" min="600" max="2500">
<input class="servo" type="range" name="7" min="600" max="2500">
<input class="servo" type="range" name="8" min="600" max="2500">
<input class="servo" type="range" name="9" min="600" max="2500">
<input class="servo" type="range" name="10" min="600" max="2500">
<input class="servo" type="range" name="11" min="600" max="2500">
<input class="servo" type="range" name="12" min="600" max="2500">
<input class="servo" type="range" name="13" min="600" max="2500">
<input class="servo" type="range" name="14" min="600" max="2500">
<input class="servo" type="range" name="15" min="600" max="2500">
    
  





</body></html>
