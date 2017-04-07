<?php

echo'<script type="text/javascript" src="speechkitt.min.js"></script>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
            $( document ).ready(function() {
						     if (window.hasOwnProperty("webkitSpeechRecognition")) 
            	{
					      var recognition = new webkitSpeechRecognition();
					      recognition.lang = "en-US";
								// Tell KITT the command to use to start listening
								SpeechKITT.setStartCommand(function() {recognition.start()});
								
								SpeechKITT.setAbortCommand(function() {recognition.abort()});
								
								recognition.addEventListener("start", SpeechKITT.onStart);
								
								recognition.addEventListener("end", SpeechKITT.onEnd);
								
								// Define a stylesheet for KITT to use
								SpeechKITT.setStylesheet("css/flat.css");
										
								SpeechKITT.vroom();
					
					      recognition.onresult = function(e) {
					      	var userTranscript = e.results[0][0].transcript;
					      	jQuery.expr[":"].containsINS = function(a, i, m) {
									  return jQuery(a).text().toUpperCase()
									      .indexOf(m[3].toUpperCase()) >= 0;
									};
								
									if (userTranscript.substring(0,6).toUpperCase() === "SEARCH") 
									{
										var searchContainer = $("#simpleSearch");
									  var $searchBox = $(searchContainer.children()[0]);
									  $searchBox.val(userTranscript.substring(6).trim());
									  var $searchButton = $(searchContainer.children()[2]);
									  $searchButton.click();
									}
									else 
										{
												var voiceElement = $("a:containsINS(" + userTranscript.toUpperCase() +")");
					      	      if (voiceElement.length !== 0) voiceElement[0].click();
										}
					      };
					      recognition.onerror = function(e) {
					        recognition.stop();
					      }
					     }
						});
              
            </script>';
?>