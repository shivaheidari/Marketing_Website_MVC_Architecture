/* ==============================================
Google Map
=============================================== */
function initialize() {
	
	"use strict";
	
	var mapProp = {
  		center:new google.maps.LatLng(40.758440, -73.985186), 		// <- Your LatLng
  		zoom:16,
		scrollwheel: false,
  		mapTypeId:google.maps.MapTypeId.ROADMAP
  	};
	var map = new google.maps.Map(document.getElementById("map"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);

/* ==============================================
jQuery
=============================================== */
$(document).ready(function () {
	var close=0;
	"use strict";
	
	// ascensor initialize
	//$('#ascensor').ascensor({ascensorMap: [[1,1],[0,0],[0,1],[0,2],[1,2],[1,0],[2,0],[2,1],[2,2]]});					 // Ascensor
	//$('#ascensor').ascensor({ascensorMap: [[1,1],[0,0],[0,1],[0,2],[1,2],[1,0],[2,0],[2,1],[2,2]], queued: true});	// Ascensor Queued
	//$('#ascensor').ascensor({ascensorMap: [[0,0],[0,1],[0,2],[0,3],[0,4],[0,5],[0,6],[0,7],[0,8]]}); 					// Horizontal
	$('#ascensor').ascensor({ascensorMap: [[0,0],[1,0],[2,0],[3,0],[4,0],[5,0],[6,0],[7,0],[8,0]]});					// Vertical
	
	// load tweets
	$(".follow .load-tweets").load("php/twitter.php");
	
	$("[href='#']").click(function(e){
		e.preventDefault();
	});
	
	// show, hide navbar
	$(".tile").click(function(){
		$(".navbar").animate({bottom:0},"slow");
	}); 
	$(".home-link").click(function(){
		$(".navbar").animate({bottom:-50},"slow");
	}); 

	// navbar-callapse close on click
	$('.navbar li a').on('click',function(){
		if ( $('.navbar-collapse').hasClass("in") ) {
			$('.navbar-collapse').collapse('hide');
		}
	})
var device_key_id=0;
var device_type=0
 $("#refresh").click(function(){
 						console.log('hi');
 						var counter=3;
 						var i=0;
 						var devid=device_key_id;
 						var devtype=device_type;
	                    var time2=setInterval(func2,1000);
  	                            function func2()
                                { 	if(device_type !=0 && device_key_id !=0)
                                {	
  									if(i<=counter)
  									{ i=i+1;
  										$.ajax({
								        type:'POST',
								        url: 'exinfo.php',
								        data:{action:'exinfo' , devkey:devid , type: devtype},
								        cache: 'false',
								        dataType: 'json',
								       success:function(devinfo)
								         {
								          console.log('successfull response exinfo');
								          //console.log(softver);
								          var data = jQuery.parseJSON(JSON.stringify(devinfo));
								          var soft=data.software;
								          var hard=data.hardware;
								          var producer=data.producer;
								          var model=data.model;
								          var status=data.status;
								          var name=data.name;
								          document.getElementById('name').innerHTML=name;
								          document.getElementById('softwareversion').innerHTML=soft;
								          document.getElementById('hardwareversion').innerHTML=hard;
								          document.getElementById('producer').innerHTML=producer;
								          document.getElementById('model').innerHTML=model;
								          if(devtype==256 & status==1)
								          {
								          	 document.getElementById('status').innerHTML='ON';
								          
								          }
								          else if(devtype==256 & status==0 )	
								          {
								          	document.getElementById('status').innerHTML='OFF';
								          }							         
								          clearInterval(time2);
								          }  


								            });
  									}
  									else{
  										clearInterval(time2);

  									}
								  


  	                            }
  	                        }
  	                           
	 

});

$("#add_new_device").click(function()
	{ //console.log('click function');
      var count=30;
      var success=0;
      var hasuccess=0;
     close=0;
     var s=0;
      
      $("#about-carousel").carousel({interval: 1000}).carousel(0);
      if(count==30)
      {
      	 $('#lastslide').replaceWith('<div class="item" id="lastslide"><img src="images/about/cancel.png" alt="about-us"></div>');
      	 s=s+1;

      }
      console.log(s);
     
      $.ajax({//first request
              type:'POST',
              url: 'add_device_edited.php',
              data:"action=addtodb",
              cache: 'false',
              dataType: 'html',
                     success:function()
                    {
                      console.log('add to db.db succeed');

                      var hadevice=setInterval(hadevice_func,1000);

                      function hadevice_func()
                      {
                        if(close==1)
                        {
                          console.log('close');
                          $("#about-carousel").carousel(31);
                          clearInterval(hadevice);

                        }
                        else if(count<=0)
                        {
                          console.log('timeout');
                           $("#about-carousel").carousel(31);
                          clearInterval(hadevice);
                        }
                        else
                        { count=count-1;
                          $.ajax({
                          type:'POST',
                          url:'add_device_edited.php',
                          data:'action=add_device',
                          cache:'false',
                          dataType:'json',
                          success:function(devarray)
                          {
                            console.log('successfull response form php checking ha.db');
                           
                              //console.log(devtype);
                              devtype=devarray['devtype'];
                              devid=devarray['devkey'];
                              //console.log(devid);
                              //console.log(devtype);
                              clearInterval(hadevice);
                            
                              epindex=0;

                            
                              //post insertlog.php 
                               $.ajax({
	                                  type:'POST',
	                                  url: 'insertlog.php',
	                                  data:{action:'insert' , devkey:devid, endindex:epindex, code:10},
	                                  cache: 'false',
	                                  dataType: 'html',
	                                 success:function(response)
	                                   {
	                                     console.log('successfull add to insertlog');
	                                     console.log(response);
	                                    }  


	                                 });

                               device_key_id=devid;
                               device_type=devtype;

                                var time2=setInterval(func2,1000);
  	                            function func2()
                                { 		
  		
								  $.ajax({
								 type:'POST',
								 url: 'exinfo.php',
								 data:{action:'exinfo' , devkey:devid , type: devtype},
								 cache: 'false',
								 dataType: 'json',
								success:function(devinfo)
								 {
								          console.log('successfull response exinfo');
								          var data = jQuery.parseJSON(JSON.stringify(devinfo));
								          var soft=data.software;
								          var hard=data.hardware;
								          var producer=data.producer;
								          var model=data.model;
								          var status=data.status;
								          var name=data.name;
								          document.getElementById('name').innerHTML=name;
								          document.getElementById('softwareversion').innerHTML=soft;
								          document.getElementById('hardwareversion').innerHTML=hard;
								          document.getElementById('producer').innerHTML=producer;
								          document.getElementById('model').innerHTML=model;
								          if(devtype==256 & status==1)
								          {
								          	 document.getElementById('status').innerHTML='ON';
								          
								          }
								          else if(devtype==256 & status==0 )	
								          {
								          	document.getElementById('status').innerHTML='OFF';
								          }							         
								          clearInterval(time2);
								  }  


								});


  	                            }
  	

                                
                               //define new time interval and send read extra info command to add_device_edited.php
                               //clear time interval of on success
                               //get values then show them in box


                              /////////////////
                                var dev_type_c='';
                               switch (devtype)
                               {
                                  case 256:
                                   // document.getElementById('device_type').innerHTML='switch';
                                     //append to show successfull adding
                                   // $('#img').append("<img  src='images/switch.png'>");
                                   document.getElementById('device_type_name').innerHTML='SWITCH';

                                    dev_type_c='switch';
                                    $('#lastslide').replaceWith("<div class='item' id='lastslide'><img src='images/about/switch.png' title='SWTICH ON/OFF' ></div>");
                                    $('#about-carousel').carousel(30);
 					                $('#lastslide').replaceWith("<div class='item' id='lastslide'><img src='images/about/switch.png' title='SWTICH ON/OFF' ></div>");
                                    $('#about-carousel').carousel(31);

                                   // $("#deviceimage").replaceWith("<div id='deviceimage'><img class='devicelogo voffset3' src='images/about/switch.png' title='SWTICH ON/OFF' ></div>");
                                    
                                    
                                   break;
                                  case 263:
                                   document.getElementById('device_type_name').innerHTML='PIR';
                                   dev_type_c='PIR';
                                   break;
                                   case 81:
                                    document.getElementById('device_type_name').innerHTML='sMART PLUG';
                                    dev_type_c='SMART plug';
                                    break;
                                  default: 
                                   document.getElementById('device_type_name').innerHTML='undefiend usage'; 
                               }
                              

                           }

                          });//end of request checking ha.db

                        }

                      } //EDD OF hadevice_func
                     

                     }//end of success add to db
                 });//end of first request
                    });
                  

	
	$("#cancel_add_device").click(function()
	{
		close=1;
		$('#lastslide').replaceWith('<div class="item" id="lastslide"><img src="images/about/cancel.png" alt="about-us"></div>');

      $('#about-carousel').carousel(31);


	});	


	
	
	
	// portfolio
	$("#grid").mixitup();
	
	// portfolio hover
	$("#grid li a ").each(function() { 
		$(this).hoverdir(); 
	});

	// center box
	function centerBox(){
		
		"use strict";
		
		var wHeight = $(window).height() ;
		$(".section .center-box").each(function() {
			var paddingTop =  $(this).height() ;
			if ( paddingTop < wHeight ) {
				paddingTop = ( wHeight - paddingTop ) / 2;
				$(this).css("padding-top",paddingTop);
			} else {
				$(this).css("padding-top","0");
			}
		});
	};
	
	$(window).resize(function(){
		centerBox();
	}).resize();

	// contact form
	$('input, textarea').placeholder();
	
	$('#contactform').submit(function(){
	
		"use strict";
		
		var action = $(this).attr('action');
		
		$("#state-message").slideUp(750,function() {
		$('#state-message').hide();
		
		$.post(action, { 
			name: $('#name').val(),
			email: $('#email').val(),
			message: $('#message').val()
		},
			function(data){
				document.getElementById('state-message').innerHTML = data;
				$('#state-message').slideDown('slow');
				$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit').removeAttr('disabled'); 
				if(data.match('success') != null) $('#contactform').slideUp('slow');
			}
		);
		});
		return false; 
	});

});

/* ==============================================
Testimonials
=============================================== */

jQuery(function( $ ){
	
	"use strict";
	
	var randomnumber, quoteclass, author, timeout;
	
	startTestimonials();
	
	$('.client .photos ul li').hover( function(){

		window.clearTimeout(timeout);
		
		$('.client .photos ul li.active').removeClass('active');
		
		quoteclass = $(this).attr('class');
		
		author = $(this).find('img').attr('alt');
		author = author.split('-');
		author = author[0] + '<span> - ' + author[1] + '</span>';
		
		$('.client .quotes ul li.active').fadeOut('slow', function(){
			$(this).removeClass('active');
			$('.client .quotes ul li.' + quoteclass).fadeIn().addClass('active');
			$('.client .photos .author').html(author);
		});
		
		$(this).addClass('active');
		
	}, function(){
		timeout = window.setTimeout( startTestimonials, 5000 );
		return false;
	});
	
	function startTestimonials() {
		
		"use strict";
		
		$('.client .photos ul li.active').removeClass('active');
		
		randomnumber = Math.floor( (Math.random()*6) + 1 );
		
		author = $('.client .photos ul li.quote-' + randomnumber).find('img').attr('alt');
		author = author.split('-');
		author = author[0] + '<span> - ' + author[1] + '</span>';
		
		$('.client .quotes ul li.active').fadeOut('slow', function(){
			$(this).removeClass('active');
			$('.client .quotes ul li.quote-' + randomnumber).fadeIn().addClass('active');
			$('.client .photos .author').html(author);
		});
		
		$('.client .photos ul li.quote-' + randomnumber).addClass('active');
		
		timeout = window.setTimeout( startTestimonials, 5000 );
	}
	
});


/* ==============================================
Loading
=============================================== */
$(window).load(function(){
	"use strict";
	jQuery('#loading').fadeOut(1000);
});