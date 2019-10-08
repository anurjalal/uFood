<!DOCTYPE html>
<html>
    <head>
	<script src="js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
function createCORSRequest(method, url) {
  var xhr = new XMLHttpRequest();
  if ("withCredentials" in xhr) {

    // Check if the XMLHttpRequest object has a "withCredentials" property.
    // "withCredentials" only exists on XMLHTTPRequest2 objects.
    xhr.open(method, url, true);

  } else if (typeof XDomainRequest != "undefined") {

    // Otherwise, check if XDomainRequest.
    // XDomainRequest only exists in IE, and is IE's way of making CORS requests.
    xhr = new XDomainRequest();
    xhr.open(method, url);

  } else {

    // Otherwise, CORS is not supported by the browser.
    xhr = null;

  }
  return xhr;
}

var xhr = createCORSRequest('GET', "http://202.169.224.53/data/arrayporn.php");
if (!xhr) {
  throw new Error('CORS not supported');
}
            //$(document).ready(function() {
            //    $.ajax({
            //        url:"http://202.169.224.53/data/arrayporn.php",
			//		type: "get",
            //        success:function(result){
            //            document.write(result);
            //        }
            //    });             
            //});
 xhr.onload = function() {
 var responseText = xhr.responseText;
 console.log(responseText);
 // process the response.
};
        </script>
    </head>
    <body>
        <h1>Test</h1>
    </body>
</html>